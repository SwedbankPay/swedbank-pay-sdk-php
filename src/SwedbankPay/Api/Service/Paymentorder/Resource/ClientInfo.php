<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource;

use SwedbankPay\Api\Client\ClientVersion;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\ClientInfoInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Class ClientInfo
 * @package SwedbankPay\Api\Service\Paymentorder\Resource
 */
class ClientInfo extends Resource implements ClientInfoInterface
{
    /**
     * ClientInfo constructor.
     * @param object|array|string $data
     */
    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->offsetSet(self::INTEGRATION_SDK_NAME, 'PHP');
        $this->offsetSet(self::INTEGRATION_SDK_VERSION, ClientVersion::version());
    }

    /**
     * @return string
     */
    public function getIntegrationSdkName()
    {
        return $this->offsetGet(self::INTEGRATION_SDK_NAME);
    }

    /**
     * @return string
     */
    public function getIntegrationSdkVersion()
    {
        return $this->offsetGet(self::INTEGRATION_SDK_VERSION);
    }

    /**
     * @return string
     */
    public function getClientType()
    {
        return $this->offsetGet(self::CLIENT_TYPE);
    }

    /**
     * @return string
     */
    public function getPlatformName()
    {
        return $this->offsetGet(self::PLATFORM_NAME);
    }

    /**
     * @return string
     */
    public function getPresentationSdkName()
    {
        return $this->offsetGet(self::PRESENTATION_SDK_NAME);
    }

    /**
     * @return string
     */
    public function getPresentationSdkVersion()
    {
        return $this->offsetGet(self::PRESENTATION_SDK_VERSION);
    }

    /**
     * @return string
     */
    public function getIntegrationModuleName()
    {
        return $this->offsetGet(self::INTEGRATION_MODULE_NAME);
    }

    /**
     * @return string
     */
    public function getIntegrationModuleVersion()
    {
        return $this->offsetGet(self::INTEGRATION_MODULE_VERSION);
    }

    /**
     * @param string $clientType
     * @return $this
     */
    public function setClientType($clientType)
    {
        return $this->offsetSet(self::CLIENT_TYPE, $clientType);
    }

    /**
     * @param string|null $platformName
     * @return $this
     */
    public function setPlatformName($platformName)
    {
        return $this->offsetSet(self::PLATFORM_NAME, $platformName);
    }

    /**
     * @param string|null $presentationSdkName
     * @return $this
     */
    public function setPresentationSdkName($presentationSdkName)
    {
        return $this->offsetSet(self::PRESENTATION_SDK_NAME, $presentationSdkName);
    }

    /**
     * @param string|null $presentationSdkVersion
     * @return $this
     */
    public function setPresentationSdkVersion($presentationSdkVersion)
    {
        return $this->offsetSet(self::PRESENTATION_SDK_VERSION, $presentationSdkVersion);
    }

    /**
     * @param string|null $integrationModuleName
     * @return $this
     */
    public function setIntegrationModuleName($integrationModuleName)
    {
        return $this->offsetSet(self::INTEGRATION_MODULE_NAME, $integrationModuleName);
    }

    /**
     * @param string|null $integrationModuleVersion
     * @return $this
     */
    public function setIntegrationModuleVersion($integrationModuleVersion)
    {
        return $this->offsetSet(self::INTEGRATION_MODULE_VERSION, $integrationModuleVersion);
    }
}
