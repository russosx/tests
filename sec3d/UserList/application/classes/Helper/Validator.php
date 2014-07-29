<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 29/07/14
 * Time: 16:51
 */

class Helper_Validator {

    protected $sanitizers = [
        'id'        => FILTER_SANITIZE_NUMBER_INT,
        'email'     => FILTER_SANITIZE_EMAIL,
    ];

    protected $validators = [
        'id'    => FILTER_VALIDATE_INT,
        'email' => FILTER_VALIDATE_EMAIL,
    ];

    private function __construct() {}

    protected function sanitize(array &$data) {
        foreach (array_keys($data) as $key) {
            $value = filter_var(trim($data[$key]), FILTER_SANITIZE_STRING);
            $data[$key] = $value;
        }
        foreach ($this->sanitizers as $key => $sanitize_filter) {
            if (array_key_exists($key, $data)) {
                $data[$key] = filter_var($data[$key], $sanitize_filter);
            }
        }
    }

    protected function validate(array $data) {
        foreach ($this->validators as $key => $validate_filter) {
            if (array_key_exists($key, $data)) {
                if ( ! filter_var($data[$key], $validate_filter)) {
                    return FALSE;
                }
            }
        }
        return TRUE;
    }

    public static function valid(array $data) {
        $validator = new self;
        $validator->sanitize($data);
        return $validator->validate($data);
    }
} 