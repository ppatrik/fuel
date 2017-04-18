<?php
/**
 * The staging database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=fuel_staging',
			'username'   => 'fuel_app',
			'password'   => 'super_secret_password',
		),
        'propelConnection' => array(
            'adapter' => 'mysql',
            'classname' => 'Propel\Runtime\Connection\ProfilerConnectionWrapper',
            'dsn' => 'mysql:host=localhost;dbname=fuel_staging',
            'user' => 'fuel_app',
            'password' => 'super_secret_password',
            'settings' => array(
                'charset' => 'utf8'
            )
        ),
	),
);
