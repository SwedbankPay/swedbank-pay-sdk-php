<?php
// phpcs:ignoreFile -- this is test

use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Payment\Resource\Request\Metadata;
use SwedbankPay\Api\Service\Trustly\Request\Purchase;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentPrefillInfo;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Trustly\Resource\Request\Payment;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentObject;
use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;

// phpcs:disable
require_once __DIR__ . '/abstract.php';
require_once __DIR__ . '/../bootstrap.php';
// phpcs:enable

/**
 * @codeCoverageIgnore
 */
class TrustlyStand extends Stand
{
    /**
     * @throws \SwedbankPay\Api\Client\Exception
     * @SuppressWarnings(PHPMD.Superglobals)
     * @SuppressWarnings(PHPMD.ExitExpression)
     */
    public function __construct()
    {
        // phpcs:disable
        if (php_sapi_name() !== 'cli-server') {
            exit();
        }
        // phpcs:enable

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
        $prefillInfo->setFirstName('Ola')
            ->setLastName('Nordmann');

        $price = new PriceItem();
        $price->setType('Trustly')
            ->setAmount(1500)
            ->setVatAmount(0);

        $prices = new PricesCollection();
        $prices->addItem($price);

        $metadata = new Metadata();
        $metadata->setData('order_id', 'or-123456');

        $payment = new Payment();
        $payment->setOperation('Purchase')
            ->setIntent('Sale')
            ->setCurrency('SEK')
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('en-US')
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo)
            ->setPrefillInfo($prefillInfo)
            ->setPrices($prices)
            ->setMetadata($metadata);

        $paymentObject = new PaymentObject();
        $paymentObject->setPayment($payment);

        $purchaseRequest = new Purchase($paymentObject);
        $purchaseRequest->setClient($this->getClient());

        /** @var ResponseServiceInterface $responseService */
        $responseService = $purchaseRequest->send();
        $responseData = $responseService->getResponseData();

        // phpcs:disable
        session_start();
        $_SESSION['payment_id'] = $responseData['payment']['id'];

        $redirectUrl = $responseService->getOperationByRel('redirect-sale', 'href');
        header('Location: ' . $redirectUrl);
        exit();
        // phpcs:enable
    }
}

new TrustlyStand();
