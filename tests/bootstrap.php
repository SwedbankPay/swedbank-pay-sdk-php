<?php

require_once __DIR__ . '/../src/PayEx/Px.php';
require_once __DIR__ . '/TestCase.php';

// Load config
if (file_exists(__DIR__ . '/config.local.ini')) {
    $config = parse_ini_file(__DIR__ . '/config.local.ini', true);
} else {
    $config = parse_ini_file(__DIR__ . '/config.ini', true);
}

define('ACCOUNT_NUMBER', $config['account_number']);
define('ENCRYPTION_KEY', $config['encryption_key']);
define('TEST_MODE', $config['test_mode']);
