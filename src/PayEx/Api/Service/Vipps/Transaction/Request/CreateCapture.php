<?php

namespace PayEx\Api\Service\Vipps\Transaction\Request;

use PayEx\Api\Service\Request;

class CreateCapture extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/vippsv1/payments/%s/captures');
    }
}
