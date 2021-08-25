<?php

use SwedbankPay\Api\Service\Creditcard\Request\Purchase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchaseCreditcard;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchaseObject;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchase;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Payment\Resource\Request\Metadata;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;

if (php_sapi_name() !== 'cli-server') {
    exit();
}

require_once __DIR__ . '/abstract.php';
require_once __DIR__ . '/../bootstrap.php';

class CreditCardStand extends Stand
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
            ->setPayeeReference($this->generateRandomString(30))
            ->setPayeeName('Merchant1')
            ->setProductCategory('A123')
            ->setOrderReference('or-123456')
            ->setSubsite('MySubsite');

        $price = new PriceItem();
        $price->setType('Creditcard')
            ->setAmount(12500)
            ->setVatAmount(0);

        $prices = new PricesCollection();
        $prices->addItem($price);

        $creditCard = new PaymentPurchaseCreditcard();
        $creditCard->setNo3DSecure(true);

        $metadata = new Metadata();
        $metadata->setData('order_id', 'or-123456');

        $payment = new PaymentPurchase();
        $payment->setOperation('Purchase')
            ->setIntent('Authorization')
            ->setCurrency('SEK')
            ->setPaymentToken('')
            ->setGeneratePaymentToken(true)
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('sv-SE')
            ->setPayerReference($this->generateRandomString(30))
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo)
            ->setPrices($prices)
            ->setMetadata($metadata);

        $paymentObject = new PaymentPurchaseObject();
        $paymentObject->setPayment($payment);
        $paymentObject->setCreditCard($creditCard);

        $purchaseRequest = new Purchase($paymentObject);
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

new CreditCardStand();