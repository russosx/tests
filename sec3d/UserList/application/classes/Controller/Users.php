<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Created by PhpStorm.
 * User: russ
 * Date: 25/07/14
 * Time: 19:25
 */

class Controller_Users extends Controller {

    protected $_action_map = [
        'GET'       => 'index',
        'POST'      => 'create',
        'PUT'       => 'update',
        'DELETE'    => 'delete',
    ];

    const ACTION_RESULT_UNDEFINED   =  0;
    const ACTION_RESULT_OK          =  1;
    const ACTION_RESULT_FAIL        = -1;

    protected $_response_result = [
        self::ACTION_RESULT_UNDEFINED   => "undefined result code",
        self::ACTION_RESULT_OK          => "ok",
        self::ACTION_RESULT_FAIL        => "fail",
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

    protected function response_result($code) {
        $code = array_key_exists($code, $this->_response_result) ? $code : self::ACTION_RESULT_UNDEFINED;
        return['result' => $code, "message" => $this->_response_result[$code]];
    }

    /*
     * REST GET method
     */
    public function action_index() {
        $this->json_response(Model_Users::getTestUsers());
    }

    /*
     * REST POST method
     */
    public function action_create() {
        $this->json_response($this->response_result(self::ACTION_RESULT_OK));
    }

    /*
     * REST PUT method
     */
    public function action_update() {
        $this->json_response($this->request->param());
    }

    /*
     * REST DELETE method
     */
    public function action_delete() {
        $this->json_response($this->request->param());
    }

    /*
     * Send the "Method Not Allowed" response
     */
    public function action_invalid()
    {
        $this->request->status = 405;
        $this->request->headers['Allow'] = implode(', ', array_keys($this->_action_map));
    }

}