<?php

namespace SwedbankPay\Api\Service\Consumer\Request;

use SwedbankPay\Api\Service\Request;

class GetShippingDetails extends Request
{
    const SHIPPING_DETAILS_URI = 'shipping_details_uri';

    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint($this->getShippingDetailsUri());
    }

    /**
     * Set Shipping Details Uri.
     *
     * @param string $uri
     * @return $this
     */
    public function setShippingDetailsUri($uri)
    {
        return $this->offsetSet(self::SHIPPING_DETAILS_URI, $uri);
    }

    /**
     * Get Shipping Details Uri.
     *
     * @return string|null
     */
    public function getShippingDetailsUri()
    {
        return $this->offsetGet(self::SHIPPING_DETAILS_URI);
    }
}
