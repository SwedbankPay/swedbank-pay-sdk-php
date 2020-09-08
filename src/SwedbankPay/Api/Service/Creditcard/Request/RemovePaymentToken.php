<?php

namespace SwedbankPay\Api\Service\Creditcard\Request;

use SwedbankPay\Api\Service\Request;

class RemovePaymentToken extends Request
{
    const INSTRUMENT_DATA_URI = 'request_method';

    public function setup()
    {
        $this->setRequestMethod('PATCH');
        $this->setRequestEndpoint($this->getInstrumentDataUri());
    }

    /**
     * Set Instrument Data Uri.
     *
     * @param string $uri
     * @return RemovePaymentToken
     */
    public function setInstrumentDataUri($uri)
    {
        return $this->offsetSet(self::INSTRUMENT_DATA_URI, $uri);
    }

    /**
     * Get Instrument Data Uri.
     *
     * @return string|null
     */
    public function getInstrumentDataUri()
    {
        return $this->offsetGet(self::INSTRUMENT_DATA_URI);
    }
}
