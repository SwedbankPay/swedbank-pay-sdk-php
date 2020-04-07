<?php

namespace SwedbankPay\Api\Client;

use \SwedbankPay\PathResolver as PathResolver;
use \SwedbankPay\Api\Client\Exception as ClientException;

/**
 * Class ClientVersion
 * @package SwedbankPay\Api\Client
 */
class ClientVersion
{
    private $clientVersion;

    /**
     * Version constructor
     *
     * @throws ClientException
     */
    public function __construct()
    {
        $this->clientVersion = $this->getVersionFromEnvironment();
    }

    /**
     * Gets the version number from a defined constant VERSION, the environment
     * variable VERSION or from composer.json.
     *
     * @return string Version number
     */
    public function getVersion() : string
    {
        return $this->clientVersion;
    }

    /**
     * Gets the version number from a defined constant VERSION, the environment
     * variable VERSION or from composer.json.
     *
     * @return string Version number
     * @throws ClientException
     */
    protected function getVersionFromEnvironment() : string
    {
        $version = null;

        if ($this->tryGetVersionNumberFromConstant($version)) {
            return $version;
        }

        if ($this->tryGetVersionNumberFromEnv($version)) {
            return $version;
        }

        if ($this->tryGetVersionNumberFromComposerJson($version)) {
            return $version;
        }

        if ($this->tryGetVersionNumberFromComposerLock($version)) {
            return $version;
        }

        throw new ClientException('VERSION not found in environment variable, composer.json or anywhere else.');
    }


    /**
      * Tries to get the version number from the constant VERSION.
      * Returns true if successful; otherwise false.
      *
      * @param string $version The by-reference $version variable to assign the version number to, if found.
      * @return bool true if successful; otherwise false.
      */
    private function tryGetVersionNumberFromConstant(&$version) : bool
    {
        if (defined('VERSION') && VERSION !== null && !empty(VERSION)) {
            $version = VERSION;
            return true;
        }

        return false;
    }


    /**
      * Tries to get the version number from the environment variable VERSION.
      * Returns true if successful; otherwise false.
      *
      * @param string $version The by-reference $version variable to assign the version number to, if found.
      * @return bool true if successful; otherwise false.
      */
    private function tryGetVersionNumberFromEnv(&$version) : bool
    {
        // phpcs:disable
        $envVersion = getenv("VERSION");
        // phpcs:enable

        if ($envVersion !== false && $envVersion !== null && !empty($envVersion)) {
            $version = $envVersion;
            return true;
        }

        return false;
    }


    /**
      * Tries to get the version number from the composer.json file.
      * Returns true if successful; otherwise false.
      *
      * @param string $version The by-reference $version variable to assign the version number to, if found.
      * @return bool true if successful; otherwise false.
      */
    private function tryGetVersionNumberFromComposerJson(&$version) : bool
    {
        $composerPath = __DIR__ . '/../../../../composer.json';
        $composer = null;

        if (!$this->tryReadJson($composerPath, $composer)) {
            return false;
        }

        if (isset($composer['version'])) {
            $version = $composer['version'];

            if ($version !== null && !empty($version)) {
                return true;
            }
        }

        return false;
    }


    /**
      * Tries to get the version number from the composer.lock file.
      * Returns true if successful; otherwise false.
      *
      * @param string $version The by-reference $version variable to assign the version number to, if found.
      * @return bool true if successful; otherwise false.
      */
    private function tryGetVersionNumberFromComposerLock(&$version) : bool
    {
        $composerLockPath = getcwd() . DIRECTORY_SEPARATOR . 'composer.lock';
        $composerLock = null;

        if (!$this->tryReadJson($composerLockPath, $composerLock)) {
            return false;
        }

        if (isset($composerLock['packages'])) {
            $packages = $composerLock['packages'];
            foreach ($packages as $package) {
                if (!isset($package['name']) ||
                    $package['name'] != "swedbank-pay/swedbank-pay-sdk-php") {
                    continue;
                }

                if (isset($package['version'])) {
                    $version = $package['version'];

                    if ($version !== null && !empty($version)) {
                        return true;
                    }
                }
            }
        }

        return false;
    }


    /**
     * Tries to read the file at $path and assigns a JSON decoded object to
     * $json if successful. Returns true if successful; otherwise false.
     *
     * @param string $path The path of the file to read and JSON decode.
     * @param object $decodedJsonObject The by-reference $decodedJsonObject variable to assign the JSON decoded object to.
     * @return bool true if the JSON decoding is successful; otherwise false.
     */
    private function tryReadJson($path, &$decodedJsonObject) : bool
    {
        $pathResolver = new PathResolver();
        $path = $pathResolver->resolve($path);

        // phpcs:disable
        if (!file_exists($path)) {
            return false;
        }

        $contents = file_get_contents($path);
        // phpcs:enable
        $decodedJsonObject = json_decode($contents, true);
        return true;
    }
}
