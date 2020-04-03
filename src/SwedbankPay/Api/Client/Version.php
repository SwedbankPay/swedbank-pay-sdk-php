<?php

namespace SwedbankPay\Api\Client;

use SwedbankPay\Api\Client\Exception as ClientException;

/**
 * Class Version
 * @package SwedbankPay\Api\Client
 */
class Version
{
    private $version;

    /**
     * Version constructor
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->version = $this->getVersionFromEnvironment();
    }

    /**
     * Gets the version number from a defined constant VERSION, the environment
     * variable VERSION or from composer.json.
     *
     * @return string Version number
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Gets the version number from a defined constant VERSION, the environment
     * variable VERSION or from composer.json.
     *
     * @return string Version number
     * @throws ClientException
     */
    protected function getVersionFromEnvironment()
    {
        if (defined('VERSION')) {
            return VERSION;
        }

        if (getenv("VERSION") !== false) {
            return getenv("VERSION");
        }

        $path = __DIR__ . '/../../../../composer.json';
        $contents = file_get_contents($path);
        $data = json_decode($contents, true);

        if (isset($data['version'])) {
            return $data['version'];
        }

        throw new ClientException('VERSION not found in environment variable, composer.json or anywhere else.');
    }
}
