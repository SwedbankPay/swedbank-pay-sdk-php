<?php

namespace SwedbankPay\Api\Service\Swish\Request;

use SwedbankPay\Api\Service\Request;

class Purchase extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/swish/payments');
        $this->setServiceOperation('Purchase');
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return $this->getRequestResource()->__toArray()['payment']['urls'];
    }
}
