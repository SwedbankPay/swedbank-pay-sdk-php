<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Framework;

use TestCase;
use SwedbankPay\Framework\DataObjectHelper;

class DataObjectHelperTest  extends TestCase
{
    public function testCamelCaseArrayKeys()
    {
        $helper = new DataObjectHelper();
        $result = $helper->camelCaseArrayKeys([]);
        $this->assertIsArray($result);
    }

    public function testUnCamelCaseArrayKeys()
    {
        $helper = new DataObjectHelper();
        $result = $helper->unCamelCaseArrayKeys([]);
        $this->assertIsArray($result);
    }

    public function testIsAssocArray()
    {
        $helper = new DataObjectHelper();
        $this->assertTrue($helper->isAssocArray(['one' => 1, 'two' => 2]));
        $this->assertFalse($helper->isAssocArray([0 => 1, 1 => 2]));
    }

    public function testReIndex()
    {
        $helper = new DataObjectHelper();
        $result = $helper->reIndex([]);
        $this->assertIsArray($result);
    }
}