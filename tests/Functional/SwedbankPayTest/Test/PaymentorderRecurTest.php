<?php

namespace SwedbankPayTest\Test;

use TestCase;

use SwedbankPay\Api\Client\Exception as ClientException;
use SwedbankPay\Api\Service\Paymentorder\Request\Recur;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\OrderItem;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\OrderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderMetadata;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderObject;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayeeInfo;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderUrl;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PaymentorderRecurTest extends TestCase
{
    public function testPaymentOrderRecur()
    {
        $urlData = new PaymentorderUrl();
        $urlData->setHostUrls(['https://example.com', 'https://example.net'])
            ->setCompleteUrl('https://example.com/payment-completed')
            ->setCancelUrl('https://example.com/payment-canceled')
            ->setPaymentUrl('https://example.com/perform-payment')
            ->setCallbackUrl('https://api.internaltest.payex.com/psp/fakecallback')
            ->setTermsOfService('https://example.com/termsandconditoons.pdf')
            ->setLogoUrl('https://example.com/logo.png');

        $payeeInfo = new PaymentorderPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
            ->setPayeeReference($this->generateRandomString(30))
            ->setPayeeName('Merchant1')
            ->setProductCategory('A123')
            ->setOrderReference('or-123456');

        // Add metadata
        $metadata = new PaymentorderMetadata();
        $metadata->setData('order_id', '123');

        // Build items collection
        $orderItems = new OrderItemsCollection();
        $orderItem = new OrderItem();
        $orderItem
            ->setReference('TEST')
            ->setName('Test product')
            ->setType('PRODUCT')
            ->setItemClass('Product')
            ->setItemUrl('https://example.com')
            ->setImageUrl('https://example.com')
            ->setDescription('Test product')
            ->setQuantity(1)
            ->setUnitPrice(12500)
            ->setQuantityUnit('pics')
            ->setVatPercent(2500)
            ->setAmount(12500)
            ->setVatAmount(2500);

        $orderItems->addItem($orderItem);

        $paymentOrder = new Paymentorder();
        $paymentOrder
            ->setOperation('Recur')
            ->setRecurrenceToken('invalid-recurrence-token')
            ->setIntent('AutoCapture')
            ->setCurrency('SEK')
            ->setAmount(12500)
            ->setVatAmount(2500)
            ->setDescription('Order #123')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('sv-SE')
            ->setUrls($urlData)
            ->setPayeeInfo($payeeInfo)
            ->setMetadata($metadata)
            ->setOrderItems($orderItems);

        $paymentOrderObject = new PaymentorderObject();
        $paymentOrderObject->setPaymentorder($paymentOrder);

        $purchaseRequest = new Recur($paymentOrderObject);
        $purchaseRequest->setClient($this->client);

        $this->expectException(ClientException::class);
        /**
         * {
         * "sessionId":"15cd268d-5883-443f-b6fd-fafb67b9c569",
         * "type":"https://api.payex.com/psp/errordetail/inputerror",
         * "title":"Error in input data",
         * "status":400,
         * "instance":"http://api.externalintegration.payex.com/psp/paymentorders",
         * "detail":"Input validation failed, error description in problems node!",
         * "problems":[{"name":"RecurrenceToken","description":"The given RecurrenceToken does not exist."
         * }]}
         */
        $purchaseRequest->send();
    }
}