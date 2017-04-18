<?php
if (!class_exists("PropelConfigHolder")) {
    /**
     * Website document root
     */
    define('DOCROOT', __DIR__ . DIRECTORY_SEPARATOR);

    /**
     * Path to the application directory.
     */
    define('APPPATH', realpath(__DIR__ . '/fuel/app/') . DIRECTORY_SEPARATOR);

    /**
     * Path to the default packages directory.
     */
    define('PKGPATH', realpath(__DIR__ . '/fuel/packages/') . DIRECTORY_SEPARATOR);

    /**
     * The path to the framework core.
     */
    define('COREPATH', realpath(__DIR__ . '/fuel/core/') . DIRECTORY_SEPARATOR);

    // Get the start time and memory for use later
    defined('FUEL_START_TIME') or define('FUEL_START_TIME', microtime(true));
    defined('FUEL_START_MEM') or define('FUEL_START_MEM', memory_get_usage());

    // Load in the Fuel autoloader
    if (!file_exists(COREPATH . 'classes' . DIRECTORY_SEPARATOR . 'autoloader.php')) {
        die("No composer autoloader found. Please run composer to install the FuelPHP framework dependencies first!\n\n");
    }

    // Load in the Fuel autoloader
    require COREPATH . 'classes' . DIRECTORY_SEPARATOR . 'autoloader.php';
    class_alias('Fuel\\Core\\Autoloader', 'Autoloader');

    // Boot the app
    require APPPATH . 'bootstrap.php';

    $database = [];
    foreach (Config::load('db') as $key => $conf) {
        if (isset($conf['propelConnection'])) {
            $database[$key] = $conf['propelConnection'];
        }
    }

    class PropelConfigHolder
    {
        public static $cache;
    }

    PropelConfigHolder::$cache = [
        'propel' => [
            'paths' => [
                'schemaDir' => APPPATH . 'propel' . DIRECTORY_SEPARATOR . 'tables',
                'outputDir' => APPPATH . 'propel',
                'phpDir' => APPPATH . 'propel' . DIRECTORY_SEPARATOR . 'classes',
                'sqlDir' => APPPATH . 'propel' . DIRECTORY_SEPARATOR . 'sql',
                'migrationDir' => APPPATH . 'migrations',
                'phpConfDir' => APPPATH . 'propel',
                'composerDir' => __DIR__
            ],
            'database' => [
                'connections' => $database
            ],
            'generator' => [
                'schema' => [
                    'autoPackage' => true
                ]
            ],
            'runtime' => [
                'log' => [
                    'defaultLogger' => [
                        'type' => 'stream',
                        'path' => APPPATH . 'logs' . DIRECTORY_SEPARATOR . 'propel.log',
                        'level' => 400
                    ],
                ]
            ]
        ]
    ];
}
return PropelConfigHolder::$cache;
