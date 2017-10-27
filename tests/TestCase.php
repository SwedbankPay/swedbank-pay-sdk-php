<?php

namespace PayEx;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /** @var Px */
    protected $px;

    protected function setUp()
    {
        if (!defined('ACCOUNT_NUMBER') ||
            !defined('ENCRYPTION_KEY')||
            !defined('TEST_MODE'))
        {
            $this->fail('Test failed: Constants are not defined');
        }

        $this->px = new Px();
        $this->px->setEnvironment(ACCOUNT_NUMBER, ENCRYPTION_KEY, TEST_MODE);
    }

    protected function tearDown()
    {
        $this->px = null;
    }
}
