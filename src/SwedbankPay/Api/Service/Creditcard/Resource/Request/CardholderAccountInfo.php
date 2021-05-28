<?php


namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\CardholderAccountInfoInterface;
use SwedbankPay\Api\Service\Resource;

class CardholderAccountInfo extends Resource implements CardholderAccountInfoInterface
{
    /**
     * @return string
     */
    public function getAccountAgeIndicator()
    {
        return $this->offsetGet(self::ACCOUNT_AGE_INDICATOR);
    }

    /**
     * @param string $indicator
     * @return $this
     */
    public function setAccountAgeIndicator($indicator)
    {
        return $this->offsetSet(self::ACCOUNT_AGE_INDICATOR, $indicator);
    }

    /**
     * @return string
     */
    public function getAccountChangeIndicator()
    {
        return $this->offsetGet(self::ACCOUNT_CHANGE_INDICATOR);
    }

    /**
     * @param string $indicator
     * @return $this
     */
    public function setAccountChangeIndicator($indicator)
    {
        return $this->offsetSet(self::ACCOUNT_CHANGE_INDICATOR, $indicator);
    }

    /**
     * @return string
     */
    public function getAccountPwdChangeIndicator()
    {
        return $this->offsetGet(self::ACCOUNT_PWD_CHANGE_INDICATOR);
    }

    /**
     * @param string $indicator
     * @return $this
     */
    public function setAccountPwdChangeIndicator($indicator)
    {
        return $this->offsetSet(self::ACCOUNT_PWD_CHANGE_INDICATOR, $indicator);
    }

    /**
     * @return string
     */
    public function getShippingAddressUsageIndicator()
    {
        return $this->offsetGet(self::SHIPPING_ADDRESS_USAGE_INDICATOR);
    }

    /**
     * @param string $indicator
     * @return $this
     */
    public function setShippingAddressUsageIndicator($indicator)
    {
        return $this->offsetSet(self::SHIPPING_ADDRESS_USAGE_INDICATOR, $indicator);
    }

    /**
     * @return string
     */
    public function getShippingNameIndicator()
    {
        return $this->offsetGet(self::SHIPPING_NAME_INDICATOR);
    }

    /**
     * @param string $indicator
     * @return $this
     */
    public function setShippingNameIndicator($indicator)
    {
        return $this->offsetSet(self::SHIPPING_NAME_INDICATOR, $indicator);
    }

    /**
     * @return string
     */
    public function getSuspiciousAccountActivity()
    {
        return $this->offsetGet(self::SUSPICIOUS_ACCOUNT_ACTIVITY);
    }

    /**
     * @param string $activity
     * @return $this
     */
    public function setSuspiciousAccountActivity($activity)
    {
        return $this->offsetSet(self::SUSPICIOUS_ACCOUNT_ACTIVITY, $activity);
    }

    /**
     * @return string
     */
    public function getAddressMatchIndicator()
    {
        return $this->offsetGet(self::ADDRESS_MATCH_INDICATOR);
    }

    /**
     * @param string $indicator
     * @return $this
     */
    public function setAddressMatchIndicator($indicator)
    {
        return $this->offsetSet(self::ADDRESS_MATCH_INDICATOR, $indicator);
    }
}
