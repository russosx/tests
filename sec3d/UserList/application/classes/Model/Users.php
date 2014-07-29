<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Created by PhpStorm.
 * User: russ
 * Date: 28/07/14
 * Time: 06:10
 */

class Model_Users {

    const DB_NAME = 'sec3d';

    protected static function db_query($type, $sql, array $params = []) {
        $data = [];
        $query = DB::query($type, $sql);
        try {
            $data = $query->execute(self::DB_NAME)->as_array();
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return $data;
    }

    public static function index() {
        return self::db_query(Database::SELECT, 'select * from users_view');
    }

    public static function create(array $user_data) {
        return Controller_Users::ACTION_RESULT_OK;
    }

    public static function update(array $user_data) {
        return Controller_Users::ACTION_RESULT_FAIL;
    }

    public static function delete($user_id) {
        return Controller_Users::ACTION_RESULT_OK;
    }
} 