<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Resource\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Request\Transfer;
use PayEx\Api\Service\Creditcard\Transaction\Resource\Request\Data\TransactionCaptureInterface;

/**
 * Transaction capture data object
 */
class TransactionCapture extends Transfer implements TransactionCaptureInterface
{

}
