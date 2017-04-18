<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=fuel_dev',
			'username'   => 'root',
			'password'   => 'root',
		),
        'propelConnection' => array(
            'adapter' => 'mysql',
            'classname' => 'Propel\Runtime\Connection\ProfilerConnectionWrapper',
            'dsn' => 'mysql:host=localhost;dbname=fuel_dev',
            'user' => 'root',
            'password' => 'root',
            'settings' => array(
                'charset' => 'utf8'
            )
        ),
	),
);
