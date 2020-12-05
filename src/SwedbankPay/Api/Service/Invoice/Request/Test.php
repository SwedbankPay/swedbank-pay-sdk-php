<?php

namespace SwedbankPay\Api\Service\Invoice\Request;

use SwedbankPay\Api\Client\Client;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Invoice;
use SwedbankPay\Api\Service\Invoice\Resource\Request\InvoicePaymentObject;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Payment;
use SwedbankPay\Api\Service\Invoice\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Client\Exception;

class Test
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
        $client = new Client();
        $client->setMerchantToken($merchantToken)
            ->setPayeeId($payeeId)
            ->setMode($isTest ? Client::MODE_TEST : Client::MODE_PRODUCTION);

        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID);

        $payment = new Payment();
        $payment->setOperation('FinancingConsumer')
            ->setPayeeInfo($payeeInfo);

        $invoice = new Invoice();
        $invoice->setInvoiceType('PayExFinancingSe');

        $invoicePaymentObject = new InvoicePaymentObject();
        $invoicePaymentObject->setPayment($payment);
        $invoicePaymentObject->setInvoice($invoice);

        $request = new CreateInvoice($invoicePaymentObject);
        $request->setClient($client);

        try {
            $request->send();
        } catch (Exception $e) {
            if (400 === $e->getCode()) {
                return;
            }

            switch ($e->getCode()) {
                case 401:
                    throw new Exception('Something is wrong with the credentials.');
                case 403:
                    throw new Exception('Something is wrong with the contract.');
            }
        }

        throw new Exception('API test has been failed.');
    }
}