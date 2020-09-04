<?php
// phpcs:ignoreFile -- this is test

use SwedbankPay\Api\Client\ClientVersion;

class ClientVersionTest extends TestCase
{
    public function testGetVersion()
    {
        // phpcs:disable
        $envVersion = getenv('VERSION');
        // phpcs:enable

        if (!defined('VERSION')) {
            define('VERSION', $envVersion);
        }

        $instance = new ClientVersion();
        $this->assertTrue(defined('VERSION'));
        $this->assertEquals($envVersion, $instance->getVersion());
    }
}
