<?php

namespace PayEx\Api\Service\Invoice\Resource\Request;

use PayEx\Api\Service\Invoice\Resource\Request\Data\PaymentUrlInterface;
use PayEx\Api\Service\Payment\Resource\Request\Url;

/**
 * Invoice payment url data object
 */
class PaymentUrl extends Url implements PaymentUrlInterface
{

}
