<?php

use \SwedbankPay\Api\Client\ClientVersion as ClientVersion;

class ClientVersionTest extends \PHPUnit\Framework\TestCase
{
    public function testGetVersionFromComposerJson() : void
    {
        $expectedVersion = '3.2.1-composer.json.42';
        $clientVersion = new TestableClientVersion(
            'composer.json',
            $expectedVersion
        );
        $actualVersion = $clientVersion->getVersion();

        $this->assertEquals($expectedVersion, $actualVersion);
    }


    public function testGetVersionFromComposerLock() : void
    {
        $expectedVersion = '3.2.1-composer.lock.42';
        $clientVersion = new TestableClientVersion(
            'composer.lock',
            $expectedVersion
        );
        $actualVersion = $clientVersion->getVersion();

        $this->assertEquals($expectedVersion, $actualVersion);
    }
}

class TestableClientVersion extends ClientVersion
{
    private $expectedFilename;
    private $expectedVersionNumber;


    public function __construct($expectedFilename, $expectedVersionNumber)
    {
        $this->expectedFilename = $expectedFilename;
        $this->expectedVersionNumber = $expectedVersionNumber;

        parent::__construct();
    }


    protected function tryReadJson($path, &$decodedJsonObject) : bool
    {
        $filename = basename($path);

        if ($filename !== $this->expectedFilename) {
            return false;
        }

        switch ($filename) {
            case 'composer.json':
                $decodedJsonObject = $this->getComposerJsonObject();
                return true;

            case 'composer.lock':
                $decodedJsonObject = $this->getComposerLockObject();
                return true;
        }

        return false;
    }

    private function getComposerJsonObject()
    {
        return [
            'name' => 'swedbank-pay/swedbank-pay-sdk-php',
            'version' => $this->expectedVersionNumber
        ];
    }


    private function getComposerLockObject()
    {
        return [
            'packages' => [
                [
                    'name' => 'swedbank-pay/swedbank-pay-sdk-php',
                    'version' => $this->expectedVersionNumber
                ]
            ]
        ];
    }
}


?>
