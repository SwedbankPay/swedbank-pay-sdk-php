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

        $composer = $this->readJson(__DIR__ . '/../../../../composer.json');

        if (isset($composer['version'])) {
            return $composer['version'];
        }

        $composerLock = $this->readJson(__DIR__ . '/../../../../composer.lock');

        if (isset($composerLock['packages'])) {
            $packages = $composerLock['packages'];
            foreach ($packages as $package) {
                if (!isset($package['name']) ||
                    $package['name'] != "swedbank-pay/swedbank-pay-sdk-php") {
                    continue;
                }

                if (isset($package['version'])) {
                    return $package['version'];
                }
            }
        }

        throw new ClientException('VERSION not found in environment variable, composer.json or anywhere else.');
    }


    /**
     * Reads the file at $path and returns it as a JSON decoded object.
     *
     * @param $path The path of the file to read and JSON decode.
     * @return object The JSON decoded object.
     */
    private function readJson($path)
    {
        $contents = file_get_contents($path);
        return json_decode($contents, true);
    }
}
