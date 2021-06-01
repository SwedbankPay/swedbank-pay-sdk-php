<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

interface CardholderAccountInfoInterface extends ResourceInterface
{
    const ACCOUNT_AGE_INDICATOR = 'account_age_indicator';
    const ACCOUNT_CHANGE_INDICATOR = 'account_change_indicator';
    const ACCOUNT_PWD_CHANGE_INDICATOR = 'account_pwd_change_indicator';
    const SHIPPING_ADDRESS_USAGE_INDICATOR = 'shipping_address_usage_indicator';
    const SHIPPING_NAME_INDICATOR = 'shipping_name_indicator';
    const SUSPICIOUS_ACCOUNT_ACTIVITY = 'suspicious_account_activity';
    const ADDRESS_MATCH_INDICATOR = 'address_match_indicator';

    /**
     * @return string
     */
    public function getAccountAgeIndicator();

    /**
     * @param string $indicator
     * @return $this
     */
    public function setAccountAgeIndicator($indicator);

    /**
     * @return string
     */
    public function getAccountChangeIndicator();

    /**
     * @param string $indicator
     * @return $this
     */
    public function setAccountChangeIndicator($indicator);

    /**
     * @return string
     */
    public function getAccountPwdChangeIndicator();

    /**
     * @param string $indicator
     * @return $this
     */
    public function setAccountPwdChangeIndicator($indicator);

    /**
     * @return string
     */
    public function getShippingAddressUsageIndicator();
    /**
     * @param string $indicator
     * @return $this
     */
    public function setShippingAddressUsageIndicator($indicator);

    /**
     * @return string
     */
    public function getShippingNameIndicator();

    /**
     * @param string $indicator
     * @return $this
     */
    public function setShippingNameIndicator($indicator);

    /**
     * @return string
     */
    public function getSuspiciousAccountActivity();

    /**
     * @param string $activity
     * @return $this
     */
    public function setSuspiciousAccountActivity($activity);

    /**
     * @return string
     */
    public function getAddressMatchIndicator();

    /**
     * @param string $indicator
     * @return $this
     */
    public function setAddressMatchIndicator($indicator);
}
