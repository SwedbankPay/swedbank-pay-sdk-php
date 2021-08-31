<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Client;

use TestCase;
use SwedbankPay\Api\Client\ClientVersion;

class ClientVersionTest extends TestCase
{
    public function testGetVersionFromJsonFile()
    {
        // phpcs:disable
        $json = json_decode(file_get_contents(__DIR__ . '/../../../../../composer.json'), true);
        // phpcs:enable

        $instance = new ClientVersion();
        $this->assertEquals($json['version'], $instance->getVersion());
    }
}
