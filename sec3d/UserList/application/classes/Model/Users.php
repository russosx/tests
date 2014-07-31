<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Created by PhpStorm.
 * User: russ
 * Date: 28/07/14
 * Time: 06:10
 */

class Model_Users {

    const DRIVER_NAME = 'sec3d';

    private static $instance;

    protected static function db() {
        return self::$instance ? self::$instance : self::createInstance();
    }

    public static function get_users($id = null) {
        return self::db()->index($id);
    }

    public static function add_user(array $user) {
        return self::db()->create($user);
    }

    public static function update_user(array $user) {
        return self::db()->update($user);
    }

    public static function delete_user($user_id) {
        $user_id = (int) $user_id;
        return self::db()->delete($user_id);
    }

    protected function db_query_first($type, $sql, array $params = []) {
        $data = $this->db_query($type, $sql, $params);
        if (isset($data[0])) {
            $data = $data[0];
        }
        return $data;
    }

    protected function db_query($type, $sql, array $params = []) {
        $data = [];
        $query = DB::query($type, $sql);
        if ( ! empty($params)) {
            $query->parameters($params);
        }
        try {
            $data = $query->execute(self::DRIVER_NAME)->as_array();
        } catch (Exception $e) {
            error_log($e->getMessage());
            $data['error'] = $e->getMessage();
        }
        return $data;
    }

    protected function index($user_id) {
        if ( ! empty($user_id)) {
            $sql = 'select * from users_view where id = :user_id';
            $params = [':user_id' => $user_id];
            return $this->db_query_first(Database::SELECT, $sql, $params);
        } else {
            return $this->db_query(Database::SELECT, 'select * from users_view');
        }
    }

    protected function create(array $user) {
        $sql = 'select create_user(:name, :surname, :code, :email, :address)';
        $params = [
            ':name'     => $user['name'],
            ':surname'  => $user['surname'],
            ':code'     => $user['code'],
            ':email'    => $user['email'],
            ':address'  => $user['address']
        ];
        return $this->db_query_first(Database::SELECT, $sql, $params);
    }

    protected function update(array $user_data) {
        $sql = 'select update_user(:id, :name, :surname, :code, :email, :address)';
        $params = [
            ':id'       => $user_data['id'],
            ':name'     => $user_data['name'],
            ':surname'  => $user_data['surname'],
            ':code'     => $user_data['code'],
            ':email'    => $user_data['email'],
            ':address'  => $user_data['address']
        ];
        return $this->db_query_first(Database::SELECT, $sql, $params);
    }

    protected function delete($user_id) {
        $sql = 'select delete_user(:id)';
        $params = [':id' => $user_id];
        return $this->db_query_first(Database::SELECT, $sql, $params);
    }

    private function __construct() {}

    private static function createInstance() {
        self::$instance = new Model_Users();
        return self::$instance;
    }


} 