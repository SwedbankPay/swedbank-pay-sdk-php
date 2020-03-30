<?php

namespace SwedbankPay\Api\Client;

/**
 * Class Version
 * @package SwedbankPay\Api\Client
 */
class Version
{
    /**
     * Gets the version number from a defined constant VERSION, the environment
     * variable VERSION or from composer.json.
     *
     * @return string Version number
     * @throws ClientException
     * @SuppressWarnings(PHPMD.ElseExpression)
     */
    public static function getVersion()
    {
        if (defined('VERSION')) {
            return VERSION;
        }

        if (getenv("VERSION") !== false) {
            return getenv("VERSION");
        }

        $composer_json_path = __DIR__ . '/../../../../composer.json';
        $composer_json_contents = file_get_contents($composer_json_path);
        $data = json_decode($composer_json_contents, true);

        if (isset($data['version'])) {
            return $data['version'];
        }

        if ($version === false) {
            throw new ClientException('VERSION not found in environment variable, composer.json or anywhere else.');
        }
    }
}
