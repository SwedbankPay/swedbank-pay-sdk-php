<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection\Item\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\Data\TransactionListItemInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

interface CaptureListItemInterface extends TransactionListItemInterface
{
    const ITEM_DESCRIPTIONS = 'item_descriptions';
    const INVOICE_COPY = 'invoice_copy';

    /**
    * @return TransactionResourceInterface
    */
    public function getItemDescriptions();

    /**
    * @param TransactionResourceInterface $itemDescriptions
    * @return $this
    */
    public function setItemDescriptions($itemDescriptions);

    /**
    * @return string
    */
    public function getInvoiceCopy();

    /**
    * @param string $invoiceCopy
    * @return $this
    */
    public function setInvoiceCopy($invoiceCopy);
}
