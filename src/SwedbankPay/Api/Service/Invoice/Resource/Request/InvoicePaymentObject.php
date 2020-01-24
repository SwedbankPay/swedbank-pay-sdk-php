<?php

namespace SwedbankPay\Api\Service\Invoice\Resource\Request;

use SwedbankPay\Api\Service\Invoice\Resource\Request\Data\InvoicePaymentObjectInterface;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Data\InvoiceInterface;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Data\PaymentInterface;
use SwedbankPay\Api\Service\Resource;

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
