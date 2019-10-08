<?php

namespace PayEx\Api\Service\Invoice\Resource\Request;

use PayEx\Api\Service\Invoice\Resource\Request\Data\InvoiceInterface;
use PayEx\Api\Service\Resource\Request as RequestResource;

/**
 * Invoice data object
 */
class Invoice extends RequestResource implements InvoiceInterface
{
    /**
     * @return string
     */
    public function getInvoiceType()
    {
        return $this->offsetGet(self::INVOICE_TYPE);
    }

    /**
     * @param string $invoiceType
     * @return $this
     */
    public function setInvoiceType($invoiceType)
    {
        return $this->offsetSet(self::INVOICE_TYPE, $invoiceType);
    }
}
