<?php

use PayEx\Api\Service\Payment\Request\Payments as PaymentsRequest;

use PayEx\Api\Service\Payment\Resource\PaymentorderPayments;
use PayEx\Api\Service\Payment\Resource\Collection\PaymentListCollection;
use PayEx\Api\Service\Payment\Resource\Collection\Item\PaymentListItem;
use PayEx\Api\Service\Payment\Resource\Response\Payments;

use PayEx\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use PayEx\Api\Service\Payment\Resource\Response\Data\PaymentsInterface as PaymentResourceInterface;

class PaymentsRequestTest extends TestCase
{
    protected $paymentsRequest;

    /**
     * @throws \PayEx\Api\Client\Exception
     */
    public function testPaymentsRequest()
    {
        $paymentId = $this->getPaymentId();

        $paymentListCreditCard = new PaymentListItem();
        $paymentListCreditCard->setId('/psp/creditcard/payments/6787b981-34ce-4eb6-0e62-08d69705f6ef')
            ->setCreated('2016-09-14T13:21:29.3182115Z')
            ->setInstrument('CreditCard');

        $paymentListInvoice = new PaymentListItem();
        $paymentListInvoice->setId('/psp/invoice/payments/5adc265f-f87f-4313-577e-08d3dca1a26d')
            ->setCreated('2016-09-14T13:21:29.3182115Z')
            ->setInstrument('Invoice');

        $paymentList = new PaymentListCollection();
        $paymentList->addItem($paymentListCreditCard)
            ->addItem($paymentListInvoice);

        $payments = new Payments();
        $payments->setId('/psp/paymentorders/6787b981-34ce-4eb6-0e62-08d69705f6ef/payments')
            ->setPaymentList($paymentList);

        $paymentOrderPaymentsData = new PaymentorderPayments();
        $paymentOrderPaymentsData->setPaymentorder('/psp/paymentorders/5adc265f-f87f-4313-577e-08d3dca1a26c')
            ->setPayments($payments);

        $this->paymentsRequest = new PaymentsRequest($paymentOrderPaymentsData);
        $this->paymentsRequest->setPaymentId($paymentId)
            ->setClient($this->client);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $this->paymentsRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var PaymentResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(PaymentResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['payment_order']));
    }
}
