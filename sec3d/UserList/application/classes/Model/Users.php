<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Created by PhpStorm.
 * User: russ
 * Date: 28/07/14
 * Time: 06:10
 */

class Model_Users {

    const DRIVER_NAME = 'sec3d';

    protected static function db_query($type, $sql, array $params = []) {
        $data = [];
        $query = DB::query($type, $sql);
        if ( ! empty($params)) {
            $query->parameters($params);
        }
        try {
            $data = $query->execute(self::DRIVER_NAME)->as_array();
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return $data;
    }

    public static function index() {
        return self::db_query(Database::SELECT, 'select * from users_view');
    }

    public static function create(array $user) {
        $sql = 'select create_user(:name, :surname, :code, :email, :address)';
        $params = [
            ':name'     => $user['name'],
            ':surname'  => $user['surname'],
            ':code'     => $user['code'],
            ':email'    => $user['email'],
            ':address'  => $user['address']
        ];
        return self::db_query(Database::SELECT, $sql, $params);
    }

    public static function update(array $user_data) {
        $sql = 'select update_user(:id, :name, :surname, :code, :email, :address)';
        $params = [
            ':id'       => $user_data['id'],
            ':name'     => $user_data['name'],
            ':surname'  => $user_data['surname'],
            ':code'     => $user_data['code'],
            ':email'    => $user_data['email'],
            ':address'  => $user_data['address']
        ];
        return self::db_query(Database::SELECT, $sql, $params);
    }

    public static function delete($user_id) {
        $sql = 'select delete_user(:id)';
        $params = [':id' => $user_id];
        return self::db_query(Database::SELECT, $sql, $params);
    }
} 