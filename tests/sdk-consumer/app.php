<?php

// phpcs:disable
require_once __DIR__ . '/vendor/autoload.php';
// phpcs:enable

// phpcs:disable
$json = json_decode(file_get_contents(__DIR__ . '/composer.json'), true);
$version = $json['version'];
// phpcs:enable

if (!empty($version)) {
    define('SwedbankPay\\Api\\Client\\VERSION', $version);
}

$client = new \SwedbankPay\Api\Client\Client();
$clientVersion = new \SwedbankPay\Api\Client\ClientVersion();
$versionNumber = $clientVersion->getVersion();

// phpcs:disable
echo "sdkversion: $versionNumber";
// phpcs:enable
