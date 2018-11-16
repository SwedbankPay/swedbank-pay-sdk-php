<?php

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
	require_once __DIR__ . '/../vendor/autoload.php';
} else {
	require_once __DIR__ . '/../src/PayEx/Api/Exception.php';
	require_once __DIR__ . '/../src/PayEx/Api/Response.php';
	require_once __DIR__ . '/../src/PayEx/Api/Client.php';
}

require_once __DIR__ . '/TestCase.php';

if (getenv('MERCHANT_TOKEN') && getenv('PAYEE_ID')) {
    define('MERCHANT_TOKEN', getenv('MERCHANT_TOKEN'));
    define('PAYEE_ID', getenv('PAYEE_ID'));        
} else {
    // Load config
    if (file_exists(__DIR__ . '/config.local.ini')) {
        $config = parse_ini_file(__DIR__ . '/config.local.ini', true);
    } else {
        $config = parse_ini_file(__DIR__ . '/config.ini', true);
    }

    define('MERCHANT_TOKEN', $config['merchant_token']);
    define('PAYEE_ID', $config['payee_id']);
}
