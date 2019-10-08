<?php

namespace PayEx\Api\Service\Invoice\Resource\Request\Data;

use PayEx\Api\Service\Resource\Data\RequestInterface;

/**
 * Invoice Interface
 *
 * @api
 */
interface InvoiceInterface extends RequestInterface
{
    const INVOICE_TYPE = 'invoice_type';

    /**
     * @return string
     */
    public function getInvoiceType();

    /**
     * @param string $invoiceType
     * @return $this
     */
    public function setInvoiceType($invoiceType);
}
