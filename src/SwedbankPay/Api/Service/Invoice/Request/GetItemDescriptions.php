<?php

namespace SwedbankPay\Api\Service\Invoice\Request;

use SwedbankPay\Api\Service\Request;

class GetItemDescriptions extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
    }
}
