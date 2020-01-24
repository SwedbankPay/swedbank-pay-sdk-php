<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection\Item;

use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection\Item\Data\CaptureListItemInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\TransactionListItem;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

class CaptureListItem extends TransactionListItem implements CaptureListItemInterface
{
    /**
     * @return TransactionResourceInterface
     */
    public function getItemDescriptions()
    {
        return $this->offsetGet(self::ITEM_DESCRIPTIONS);
    }

    /**
     * @param TransactionResourceInterface $itemDescriptions
     * @return $this
     */
    public function setItemDescriptions($itemDescriptions)
    {
        $this->offsetSet(self::ITEM_DESCRIPTIONS, $itemDescriptions);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getInvoiceCopy()
    {
        return $this->offsetGet(self::INVOICE_COPY);
    }

    /**
     * @param string $invoiceCopy
     * @return $this
     */
    public function setInvoiceCopy($invoiceCopy)
    {
        $this->offsetSet(self::INVOICE_COPY, $invoiceCopy);
        return $this;
    }
}
