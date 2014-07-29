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
        'POST'      => 'create',
        'PUT'       => 'update',
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
        $this->response->body(json_encode($json_data));
    }

    protected function db_action_result(array $args = [], $method_name = null) {
        $method_name = isset($method_name) ? $method_name : $this->request->action();
        $static_method_to_call = [self::USERS_MODEL_NAME, $method_name];
        $result = forward_static_call_array($static_method_to_call, $args);
        return $result;
    }

    /*
     * REST GET method
     */
    public function action_index() {
        $this->json_response($this->db_action_result());
    }

    /*
     * REST POST method
     */
    public function action_create() {
        $new_user = $this->get_request_json();
        if (Helper_Validator::valid($new_user)) {
            $this->json_response($this->db_action_result([$new_user], 'create'));
        } else {
            $this->json_response([]);
        }
    }

    /*
     * REST PUT method
     */
    public function action_update() {
        $user_to_update = $this->get_request_json();
        if (Helper_Validator::valid($user_to_update)) {
            $this->json_response($this->db_action_result([$user_to_update], 'update'));
        } else {
            $this->json_response([]);
        }
    }

    /*
     * REST DELETE method
     */
    public function action_delete() {
        $user_id = $this->request->param('id');
        $this->json_response($this->db_action_result([$user_id]), 'delete');
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

}