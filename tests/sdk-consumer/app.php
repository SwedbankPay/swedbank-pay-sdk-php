<?php

// phpcs:disable
require_once __DIR__ . '/vendor/autoload.php';
// phpcs:enable

use \SwedbankPay\Api\Client;

$client = new \SwedbankPay\Api\Client\Client();
$clientVersion = new \SwedbankPay\Api\Client\ClientVersion();
$versionNumber = $clientVersion->getVersion();

// phpcs:disable
echo "sdkversion: $versionNumber";
// phpcs:enable

?>
