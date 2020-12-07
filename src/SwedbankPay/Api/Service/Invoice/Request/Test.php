<?php

namespace SwedbankPay\Api\Service\Invoice\Request;

use SwedbankPay\Api\Service\Base\Request\Test as BaseTest;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Invoice;
use SwedbankPay\Api\Service\Invoice\Resource\Request\InvoicePaymentObject;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Payment;
use SwedbankPay\Api\Service\Invoice\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Client\Exception;

class Test extends BaseTest
{
    /**
     * Test constructor.
     * @param string $merchantToken
     * @param string $payeeId
     * @param bool $isTest
     * @throws Exception
     */
    public function __construct($merchantToken, $payeeId, $isTest = true)
    {
        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId($payeeId);

        $payment = new Payment();
        $payment->setOperation('FinancingConsumer')
            ->setPayeeInfo($payeeInfo);

        $invoice = new Invoice();
        $invoice->setInvoiceType('PayExFinancingSe');

        $invoicePaymentObject = new InvoicePaymentObject();
        $invoicePaymentObject->setPayment($payment);
        $invoicePaymentObject->setInvoice($invoice);

        $request = new CreateInvoice($invoicePaymentObject);
        $this->sendRequest($merchantToken, $payeeId, $isTest, $request);
    }
}
