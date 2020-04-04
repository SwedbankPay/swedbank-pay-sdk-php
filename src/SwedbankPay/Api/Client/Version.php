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

        $composerPath = __DIR__ . '/../../../../composer.json';
        $composer = $this->readJson($composerPath);

        if (isset($composer['version'])) {
            return $composer['version'];
        }

        $composerLockPath = getcwd() . DIRECTORY_SEPARATOR . 'composer.lock';
        $composerLock = $this->readJson($composerLockPath);

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
        $path = $this->truePath($path);
        $contents = file_get_contents($path);
        return json_decode($contents, true);
    }


    /**
    * This function is to replace PHP's extremely buggy realpath().
    * https://stackoverflow.com/a/4050444/61818
    *
    * @param string The original path, can be relative etc.
    * @return string The resolved path, it might not exist.
    */
    private function truePath($path)
    {
        // whether $path is unix or not
        $unipath = strlen($path) == 0 || $path{0} != '/';

        // attempts to detect if path is relative in which case, add cwd
        if (strpos($path, ':') === false && $unipath) {
            $path = getcwd() . DIRECTORY_SEPARATOR . $path;
        }

        // resolve path parts (single dot, double dot and double delimiters)
        $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
        $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
        $absolutes = array();

        foreach ($parts as $part) {
            if ('.'  == $part) {
                continue;
            }

            if ('..' == $part) {
                array_pop($absolutes);
            } else {
                $absolutes[] = $part;
            }
        }

        $path = implode(DIRECTORY_SEPARATOR, $absolutes);

        // resolve any symlinks
        if (file_exists($path) && linkinfo($path) > 0) {
            $path = readlink($path);
        }

        // put initial separator that could have been lost
        $path = !$unipath ? '/' . $path : $path;

        return $path;
    }
}
