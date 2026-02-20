<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Client info interface
 *
 * @api
 */
interface ClientInfoInterface extends ResourceInterface {
	const INTEGRATION_SDK_NAME       = 'integration_sdk_name';
	const INTEGRATION_SDK_VERSION    = 'integration_sdk_version';
	const CLIENT_TYPE                = 'client_type';
	const PLATFORM_NAME              = 'platform_name';
	const PRESENTATION_SDK_NAME      = 'presentation_sdk_name';
	const PRESENTATION_SDK_VERSION   = 'presentation_sdk_version';
	const INTEGRATION_MODULE_NAME    = 'integration_module_name';
	const INTEGRATION_MODULE_VERSION = 'integration_module_version';

	/**
	 * @return string
	 */
	public function getIntegrationSdkName();

	/**
	 * @return string
	 */
	public function getIntegrationSdkVersion();

	/**
	 * @return string
	 */
	public function getClientType();

	/**
	 * @return string
	 */
	public function getPlatformName();

	/**
	 * @return string
	 */
	public function getPresentationSdkName();

	/**
	 * @return string
	 */
	public function getPresentationSdkVersion();

	/**
	 * @return string
	 */
	public function getIntegrationModuleName();

	/**
	 * @return string
	 */
	public function getIntegrationModuleVersion();

	/**
	 * @param string $clientType
	 * @return $this
	 */
	public function setClientType($clientType);

	/**
	 * @param string|null $platformName
	 * @return $this
	 */
	public function setPlatformName($platformName);

	/**
	 * @param string|null $presentationSdkName
	 * @return $this
	 */
	public function setPresentationSdkName($presentationSdkName);

	/**
	 * @param string|null $presentationSdkVersion
	 * @return $this
	 */
	public function setPresentationSdkVersion($presentationSdkVersion);

	/**
	 * @param string|null $integrationModuleName
	 * @return $this
	 */
	public function setIntegrationModuleName($integrationModuleName);

	/**
	 * @param string|null $integrationModuleVersion
	 * @return $this
	 */
	public function setIntegrationModuleVersion($integrationModuleVersion);
}
