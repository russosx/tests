<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Created by PhpStorm.
 * User: russ
 * Date: 25/07/14
 * Time: 19:25
 */

class Controller_Users extends Controller {

    const USERS_MODEL_NAME          = 'Model_Users';

    protected $_action_map = [
        'GET'       => 'index',
        'POST'      => 'save',
        'PUT'       => 'save',
        'DELETE'    => 'delete',
    ];

    public function before() {
        $http_method = $this->request->method();

        if ( ! isset($this->_action_map[$http_method]))
        {
            $this->request->action('invalid');
        }
        else
        {
            $this->request->action($this->_action_map[$http_method]);
        }

        $this->response->headers('Content-Type', 'application/json; charset=utf-8');
    }

    protected function json_response(array $json_data) {
        $this->response->body(json_encode($json_data), JSON_FORCE_OBJECT);
    }

    protected function empty_obj_response() {
        $this->json_response([]);
    }

    /*
     * REST GET method
     */
    public function action_index() {
        $user_id = $this->request->param('id');
        $this->json_response(Model_Users::get_users($user_id));
    }

    /*
     * REST POST (new user) and PUT (edit user) methods
     */
    public function action_save() {
        $user = $this->get_request_json();
        if (Helper_Validator::valid($user)) {
            if ($this->is_new_user($user)) {
                $this->add_user($user, $result_key, $result, $user_id);
            } else {
                $this->update_user($user, $result_key, $result, $user_id);
            }
            if (array_key_exists($result_key, $result)) {
                $user = Model_Users::get_users($user_id);
                $this->json_response($user);
            } else {
                $this->json_response($result);
            }
        } else {
            $error = 'User validation failed';
            error_log($error . ': ' . print_r($user, true));
            $this->json_response(['error' => $error]);
        }
    }

    /*
     * REST DELETE method
     */
    public function action_delete() {
        $user_id = $this->request->param('id');
        if ( ! empty($user_id)) {
            $this->json_response(Model_Users::delete_user($user_id));
        } else {
            $this->empty_obj_response();
        }
    }

    /*
     * Send the "Method Not Allowed" response
     */
    public function action_invalid()
    {
        $this->request->status = 405;
        $this->request->headers['Allow'] = implode(', ', array_keys($this->_action_map));
    }

    protected function get_request_json()
    {
        return json_decode($this->request->body(), true);
    }

    protected function is_new_user($user)
    {
        return ( ! isset($user['id']));
    }

    /**
     * @param $user
     * @param $result_key
     * @param $result
     * @param $user_id
     */
    protected function update_user($user, &$result_key, &$result, &$user_id)
    {
        $result_key = 'update_user';
        $result = Model_Users::update_user($user);
        $user_id = $user['id'];
    }

    /**
     * @param $user
     * @param $result_key
     * @param $result
     * @param $user_id
     */
    protected function add_user($user, &$result_key, &$result, &$user_id)
    {
        $result_key = 'create_user';
        $result = Model_Users::add_user($user);
        $user_id = $result[$result_key];
    }

}