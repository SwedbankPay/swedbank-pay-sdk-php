<?php

use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Payment\Resource\Request\Metadata;
use SwedbankPay\Api\Service\Vipps\Request\Purchase;
use SwedbankPay\Api\Service\Vipps\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Vipps\Resource\Request\PaymentPrefillInfo;
use SwedbankPay\Api\Service\Vipps\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Vipps\Resource\Request\Payment;
use SwedbankPay\Api\Service\Vipps\Resource\Request\VippsPaymentObject;
use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;

if (php_sapi_name() !== 'cli-server') {
    exit();
}

require_once __DIR__ . '/abstract.php';
require_once __DIR__ . '/../bootstrap.php';

class VippsStand extends Stand
{
    public function __construct()
    {
        $url = new PaymentUrl();
        $url->setCompleteUrl('http://localhost:8000/complete.php')
            ->setCancelUrl('http://localhost:8000/cancel.php')
            ->setCallbackUrl('http://localhost:8000/callback.php')
            ->setHostUrls(['http://localhost:8000']);

        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
            ->setPayeeReference($this->generateRandomString(12))
            ->setPayeeName('Merchant1')
            ->setProductCategory('A123')
            ->setOrderReference('or-123456')
            ->setSubsite('MySubsite');

        $prefillInfo = new PaymentPrefillInfo();
        $prefillInfo->setMsisdn('+4759212345');

        $price = new PriceItem();
        $price->setType('Vipps')
            ->setAmount(12500)
            ->setVatAmount(0);

        $prices = new PricesCollection();
        $prices->addItem($price);

        $metadata = new Metadata();
        $metadata->setData('order_id', 'or-123456');

        $payment = new Payment();
        $payment->setOperation('Purchase')
            ->setIntent('Authorization')
            ->setCurrency('NOK')
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('nb-NO')
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo)
            ->setPrefillInfo($prefillInfo)
            ->setPrices($prices)
            ->setMetadata($metadata);

        $vippsPaymentObject = new VippsPaymentObject();
        $vippsPaymentObject->setPayment($payment);

        $purchaseRequest = new Purchase($vippsPaymentObject);
        $purchaseRequest->setClient($this->getClient());

        /** @var ResponseServiceInterface $responseService */
        $responseService = $purchaseRequest->send();
        $responseData = $responseService->getResponseData();

        session_start();
        $_SESSION['payment_id'] = $responseData['payment']['id'];

        $redirectUrl = $responseService->getOperationByRel('redirect-authorization', 'href');
        header('Location: ' . $redirectUrl);
        exit();
    }
}

new VippsStand();
