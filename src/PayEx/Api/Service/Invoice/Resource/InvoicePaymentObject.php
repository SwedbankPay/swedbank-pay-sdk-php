<?php

namespace PayEx\Api\Service\Invoice\Resource;

use PayEx\Api\Service\Invoice\Resource\Data\InvoicePaymentObjectInterface;
use PayEx\Api\Service\Invoice\Resource\Request\Data\InvoiceInterface;
use PayEx\Api\Service\Invoice\Resource\Request\Data\PaymentInterface;
use PayEx\Api\Service\Resource;

/**
 * Invoice Payment object
 */
class InvoicePaymentObject extends Resource implements InvoicePaymentObjectInterface
{
    /**
     * @return PaymentInterface
     */
    public function getPayment()
    {
        return $this->offsetGet(self::PAYMENT);
    }

    /**
     * @param PaymentInterface $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        return $this->offsetSet(self::PAYMENT, $payment);
    }

    /**
     * @return InvoiceInterface
     */
    public function getInvoice()
    {
        return $this->offsetGet(self::INVOICE);
    }

    /**
     * @param InvoiceInterface $invoice
     * @return $this
     */
    public function setInvoice($invoice)
    {
        return $this->offsetSet(self::INVOICE, $invoice);
    }
}
