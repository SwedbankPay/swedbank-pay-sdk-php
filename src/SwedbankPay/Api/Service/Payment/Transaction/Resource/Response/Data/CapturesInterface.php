<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;

interface CapturesInterface extends TransactionResourceInterface
{
    const CAPTURE_LIST = 'capture_list';

    /**
    * @return TransactionListCollection
    */
    public function getCaptureList();
    
    /**
    * @param TransactionListCollection $captureList
    * @return $this
    */
    public function setCaptureList($captureList);
}
