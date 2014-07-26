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

    function action_list() {
        $this->response->body(json_encode(array(
            array(
                'guid' => 'guid1',
                'name' => 'Петр',
                'surname' => 'Чайковский',
                'code' => '12312378990',
                'email' => 'chak@gmail.com',
                'address' => 'R.I.P',
            ),
            array(
                'guid' => 'guid2',
                'name' => 'Васька',
                'surname' => 'Пупкин',
                'code' => '900000000000',
                'email' => 'pup@gmail.com',
                'address' => 'г. Пупкин, Пупкинская обл., Пупкинский р-н, ул. Пупкина, д. 90, кв. 90',
            ),
        )));
    }

}