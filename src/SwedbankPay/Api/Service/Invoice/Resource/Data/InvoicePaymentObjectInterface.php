<?php

namespace PayEx\Api\Service\Invoice\Resource\Data;

use PayEx\Api\Service\Data\ResourceInterface;
use PayEx\Api\Service\Invoice\Resource\Request\Data\InvoiceInterface;
use PayEx\Api\Service\Invoice\Resource\Request\Data\PaymentInterface;

/**
 * Invoice Payment object interface
 *
 * @api
 */
interface InvoicePaymentObjectInterface extends ResourceInterface
{
    const PAYMENT = 'payment';
    const INVOICE = 'invoice';

    /**
     * @return PaymentInterface
     */
    public function getPayment();

    /**
     * @param PaymentInterface $payment
     * @return $this
     */
    public function setPayment($payment);

    /**
     * @return InvoiceInterface
     */
    public function getInvoice();

    /**
     * @param InvoiceInterface $invoice
     * @return $this
     */
    public function setInvoice($invoice);
}
