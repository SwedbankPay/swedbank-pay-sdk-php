<?php

namespace SwedbankPay\Api\Service\Invoice\Request;

use SwedbankPay\Api\Service\Request;

class CreateApprovedLegalAddress extends Request
{
    public function setup()
    {
        $this->setOperationRel('create-approved-legal-address');

        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/invoice/payments/%s/approvedlegaladdress');
    }
}
