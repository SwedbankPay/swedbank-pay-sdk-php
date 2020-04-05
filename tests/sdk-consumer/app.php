<?php

require_once __DIR__ . '/vendor/autoload.php';

use \SwedbankPay\Api\Client;

$client = new \SwedbankPay\Api\Client\Client();
$version = new \SwedbankPay\Api\Client\Version();

$v = $version->getVersion();
echo "version: $v";

?>
