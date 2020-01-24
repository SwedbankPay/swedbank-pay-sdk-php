<?php

namespace SwedbankPay\Api\Service\Invoice\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

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
