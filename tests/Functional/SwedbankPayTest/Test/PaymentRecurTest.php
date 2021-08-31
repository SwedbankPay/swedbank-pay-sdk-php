<?php

namespace SwedbankPayTest\Test;

use TestCase;
use SwedbankPay\Api\Client\Exception as ClientException;
use SwedbankPay\Api\Service\Creditcard\Request\Purchase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentRecur;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentRecurObject;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentUrl;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PaymentRecurTest extends TestCase
{
    public function testCardRecur()
    {
        $url = new PaymentUrl();
        $url->setCallbackUrl('http://test-dummy.net/payment-callback');

        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
            ->setPayeeReference($this->generateRandomString(30))
            ->setPayeeName('Merchant1')
            ->setProductCategory('A123')
            ->setOrderReference('or-123456')
            ->setSubsite('MySubsite');

        $payment = new PaymentRecur();
        $payment
            ->setOperation('Recur')
            ->setRecurrenceToken('invalid-recurrence-token')
            ->setIntent('AutoCapture')
            ->setCurrency('SEK')
            ->setAmount(12500)
            ->setVatAmount(2500)
            ->setDescription('Order #123')
            ->setPayerReference('payer@example.com')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('sv-SE')
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo);

        $paymentObject = new PaymentRecurObject();
        $paymentObject->setPayment($payment);

        $purchaseRequest = new Purchase($paymentObject);
        $purchaseRequest->setClient($this->client);

        $this->expectException(ClientException::class);
        /**
         * {"type":"https://api.payex.com/psp/errordetail/inputerror",
         * "title":"Error in input data",
         * "status":400,
         * "instance":"/payments",
         * "detail":"Input validation failed, error description in problems node!",
         * "problems":[
         * {"name":"payment.recurrenceToken",
         * "description":"Error converting value \"invalid-recurrence-token\" to type 'System.Nullable`1[System.Guid]'.
         * Path 'payment.recurrenceToken', line 19, position 53."}
         * ]}
         */
        $purchaseRequest->send();
    }
}
