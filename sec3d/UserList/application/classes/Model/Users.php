<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Created by PhpStorm.
 * User: russ
 * Date: 28/07/14
 * Time: 06:10
 */

class Model_Users extends Model {

    public static function getTestUsers() {
        $test_users = [
            [
                'guid' => 'guid1', 'name' => 'Петр', 'surname' => 'Чайковский',
                'code' => '12312378990', 'email' => 'chak@gmail.com', 'address' => 'R.I.P',
            ],
            [
                'guid' => 'guid2', 'name' => 'Васька', 'surname' => 'Пупкин',
                'code' => '900000000000', 'email' => 'pup@gmail.com',
                'address' => 'г. Пупкин, Пупкинская обл., Пупкинский р-н, ул. Пупкина, д. 90, кв. 90',
            ]
        ];
        return $test_users;
    }
} 