<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
    'sec3d' => array(
        'type' => 'PDO',
        'connection' => array(
			'dsn'        => 'pgsql:host=localhost;port=5432;dbname=sec3d',
			'username'   => 'russ',
			'password'   => 'russ',
			'persistent' => TRUE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),
);
