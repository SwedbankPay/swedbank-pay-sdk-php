<?php

namespace SwedbankPay\Api\Service\MobilePay\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Transfer;
use SwedbankPay\Api\Service\MobilePay\Transaction\Resource\Request\Data\TransactionCaptureInterface;

/**
 * Transaction capture data object
 */
class TransactionCapture extends Transfer implements TransactionCaptureInterface
{

}
