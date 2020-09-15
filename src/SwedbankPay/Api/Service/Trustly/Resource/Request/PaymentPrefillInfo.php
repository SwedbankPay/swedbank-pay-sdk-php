<?php

namespace SwedbankPay\Api\Service\Trustly\Resource\Request;

use SwedbankPay\Api\Service\Trustly\Resource\Request\Data\PaymentPrefillInfoInterface;
use SwedbankPay\Api\Service\Payment\Resource\Request\PrefillInfo;

/**
 * Trustly payment prefill info data object
 */
class PaymentPrefillInfo extends PrefillInfo implements PaymentPrefillInfoInterface
{
    /**
     * Get Prefilled value to put in the first name text box.
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->offsetGet(self::FIRST_NAME);
    }

    /**
     * Set Prefilled value to put in the first name text box.
     *
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        return $this->offsetSet(self::FIRST_NAME, $firstName);
    }

    /**
     * Get Prefilled value to put in the last name text box.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->offsetGet(self::LAST_NAME);
    }

    /**
     * Set Prefilled value to put in the last name text box.
     *
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        return $this->offsetSet(self::LAST_NAME, $lastName);
    }
}
