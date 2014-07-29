<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
    'sec3d' => array(
        'type' => 'PDO',
        'connection' => array(
			'dsn'        => 'pgsql:host=localhost;port=5432;dbname=sec3d',
			'username'   => 'sec3d',
			'password'   => 'sec3d',
			'persistent' => TRUE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),
);
