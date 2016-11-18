<?php

require_once __DIR__ . '/../src/PayEx/Px.php';
require_once __DIR__ . '/TestCase.php';

// Load config
if (getenv('ACCOUNT_NUMBER')) {
    $config = array(
        'account_number' => getenv('ACCOUNT_NUMBER'),
        'encryption_key' => getenv('ENCRYPTION_KEY'),
        'test_mode' => (bool) getenv('TEST_MODE')
    );
} else {
    if (file_exists(__DIR__ . '/config.local.ini')) {
        $config = parse_ini_file(__DIR__ . '/config.local.ini', true);
    } else {
        $config = parse_ini_file(__DIR__ . '/config.ini', true);
    }
}

define('ACCOUNT_NUMBER', $config['account_number']);
define('ENCRYPTION_KEY', $config['encryption_key']);
define('TEST_MODE', $config['test_mode']);
