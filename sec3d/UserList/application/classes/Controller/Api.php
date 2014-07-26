<?php

/**
 * Created by PhpStorm.
 * User: russ
 * Date: 25/07/14
 * Time: 19:25
 */

class Controller_Api extends Controller  {

    function before() {
        $this->response->headers('Content-Type', 'application/json; charset=utf-8');
    }

}