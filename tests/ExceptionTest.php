<?php

namespace PayEx;

class ExceptionTest extends TestCase
{
    public function testExceptionUndefinedEnvironment()
    {
        // Set empty environment
        $this->px->setEnvironment('', '', TEST_MODE);

        $e = null;
        try {
            $result = $this->px->Test([]);
        } catch (\Exception $e) {
            //
        }

        $this->assertEquals('Exception', get_class($e));
        $this->assertEquals('Account number or Encryption key not defined. Use setEnvironment().', $e->getMessage());
    }

    public function testExceptionUnknownMethod()
    {
        $e = null;
        try {
            $result = $this->px->Test([]);
        } catch (\Exception $e) {
            //
        }

        $this->assertEquals('Exception', get_class($e));
        $this->assertEquals('Unknown PayEx Method.', $e->getMessage());
    }

    public function testExceptionUnknownMethod1()
    {
        $e = null;
        try {
            $result = $this->px->__call('Initialize8', null);
        } catch (\Exception $e) {
            //
        }

        $this->assertEquals('Exception', get_class($e));
        $this->assertEquals('Invalid PayEx Method params.', $e->getMessage());
    }
}
