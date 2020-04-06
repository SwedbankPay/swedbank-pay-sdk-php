<?php

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
	require_once __DIR__ . '/../vendor/autoload.php';
} else {
    spl_autoload_register(function ($className) {
        $autoLoadPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
        $classFile = $autoLoadPath . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        if (file_exists($classFile)) {
            require_once $classFile;
            return true;
        }
        return false;
    });
}

require_once __DIR__ . '/TestCase.php';

if (getenv('MERCHANT_TOKEN') && getenv('PAYEE_ID') && getenv('VERSION')) {
    define('MERCHANT_TOKEN', getenv('MERCHANT_TOKEN'));
    define('PAYEE_ID', getenv('PAYEE_ID'));
    define('VERSION', getenv('VERSION'));
} else {
    // Load config
    if (file_exists(__DIR__ . '/config.local.ini')) {
        $config = parse_ini_file(__DIR__ . '/config.local.ini', true);
    } else {
        $config = parse_ini_file(__DIR__ . '/config.ini', true);
    }

    define('MERCHANT_TOKEN', $config['merchant_token']);
    define('PAYEE_ID', $config['payee_id']);

    $data = json_decode(file_get_contents(__DIR__ . '../composer.json'), true);
    if (isset($data['version'])) {
        define('VERSION', $data['version']);
    } else {
        define('VERSION', $config['version']);
    }
}
