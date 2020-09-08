<?php

namespace SwedbankPay\Api\Service\Consumer\Request;

use SwedbankPay\Api\Service\Request;

class GetBillingDetails extends Request
{
    const BILLING_DETAILS_URI = 'billing_details_uri';

    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint($this->getBillingDetailsUri());
    }

    /**
     * Set Billing Details Uri.
     *
     * @param string $uri
     * @return $this
     */
    public function setBillingDetailsUri($uri)
    {
        return $this->offsetSet(self::BILLING_DETAILS_URI, $uri);
    }

    /**
     * Get Billing Details Uri.
     *
     * @return string|null
     */
    public function getBillingDetailsUri()
    {
        return $this->offsetGet(self::BILLING_DETAILS_URI);
    }
}
