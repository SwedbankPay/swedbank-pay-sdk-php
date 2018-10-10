<?php

require_once __DIR__ . '/../src/PayEx/Api/Exception.php';
require_once __DIR__ . '/../src/PayEx/Api/Response.php';
require_once __DIR__ . '/../src/PayEx/Api/Client.php';
require_once __DIR__ . '/TestCase.php';

// Load config
if (!getenv('MERCHANT_TOKEN') || getenv('PAYEE_ID')) {
    if (file_exists(__DIR__ . '/config.local.ini')) {
        $config = parse_ini_file(__DIR__ . '/config.local.ini', true);
    } else {
        $config = parse_ini_file(__DIR__ . '/config.ini', true);
    }

    define('MERCHANT_TOKEN', $config['merchant_token']);
    define('PAYEE_ID', $config['payee_id']);
}
