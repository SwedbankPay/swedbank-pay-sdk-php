<?php

use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\OrderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\OrderItem;

use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderUrl;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayeeInfo;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayer;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderMetadata;

use SwedbankPay\Api\Service\Paymentorder\Request\Purchase;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderObject;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

class PurchaseTest extends TestCase
{
    protected $purchaseRequest;

    public function testPurchaseRequest()
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

        $payer = new PaymentorderPayer();
        $payer->setConsumerProfileRef('7d5788219e5bc43350e75ac633e0480ab30ad20f96797a12b96e54da869714c4');

        $metadata = new PaymentorderMetadata();
        $metadata->setKey1('value1')
            ->setKey2(2)
            ->setKey3(3.1)
            ->setKey4(false);

        $orderItems = new OrderItemsCollection();

        $orderItem = new OrderItem();
        $orderItem->setReference('P1')
            ->setName('Product1')
            ->setType('PRODUCT')
            ->setItemClass('ProductGroup1')
            ->setItemUrl('https://example.com/products/123')
            ->setImageUrl('https://example.com/product123.jpg')
            ->setDescription('Product 1 description')
            ->setDiscountDescription('Volume discount')
            ->setQuantity(1)
            ->setUnitPrice(1500)
            ->setQuantityUnit('pcs')
            ->setDiscountDescription(0)
            ->setVatPercent(0)
            ->setAmount(1500)
            ->setVatAmount(0);

        $orderItems->addItem($orderItem);

        $paymentOrder = new Paymentorder();
        $paymentOrder->setOperation('Purchase')
            ->setCurrency('NOK')
            ->setAmount('1500')
            ->setVatAmount(0)
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('nb-NO')
            ->setGeneratePaymentToken(true)
            ->setDisablePaymentMenu(false)
            ->setUrls($urlData)
            ->setPayeeInfo($payeeInfo)
            ->setMetadata($metadata)
            ->setOrderItems($orderItems);

        $paymentOrderObject = new PaymentorderObject();
        $paymentOrderObject->setPaymentorder($paymentOrder);

        $this->purchaseRequest = new Purchase($paymentOrderObject);
        $this->purchaseRequest->setClient($this->client);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $this->purchaseRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['payment_order']));
        $this->assertTrue(isset($result['payment_order']['items']));
        $this->assertTrue(isset($result['payment_order']['order_items']));
        $this->assertTrue(isset($result['operations']));
        $this->assertTrue(($result['payment_order']['operation']) === 'Purchase');
    }
}
