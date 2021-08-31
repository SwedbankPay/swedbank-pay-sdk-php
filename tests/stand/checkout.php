<?php
// phpcs:ignoreFile -- this is test

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

// phpcs:disable
require_once __DIR__ . '/abstract.php';
require_once __DIR__ . '/../bootstrap.php';
// phpcs:enable

/**
 * @codeCoverageIgnore
 */
class CheckoutStand extends Stand
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

        $urlData = new PaymentorderUrl();
        $urlData->setCompleteUrl('http://localhost:8000/complete.php')
            ->setCancelUrl('http://localhost:8000/cancel.php')
            ->setCallbackUrl('http://localhost:8000/callback.php')
            ->setHostUrls(['http://localhost:8000', 'https://localhost:8000'])
            ->setTermsOfService('https://example.com/termsandconditoons.pdf')
            ->setLogoUrl('https://example.com/logo.png');

        $payeeInfo = new PaymentorderPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
            ->setPayeeReference($this->generateRandomString(30))
            ->setPayeeName('Merchant1')
            ->setProductCategory('A123')
            ->setOrderReference('or-123456');

        $payer = new PaymentorderPayer();
        $payer->setEmail('olivia.nyhuus@payex.com')
            ->setMsisdn('+4798765432')
            ->setWorkPhoneNumber('+4787654321')
            ->setHomePhoneNumber('+4776543210');

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
            ->setItemUrl('http://localhost:8000/products/123')
            ->setImageUrl('http://localhost:8000/product123.jpg')
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
            ->setCurrency('SEK')
            ->setAmount(1500)
            ->setVatAmount(0)
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('nb-NO')
            ->setGeneratePaymentToken(false)
            ->setDisablePaymentMenu(false)
            ->setUrls($urlData)
            ->setPayeeInfo($payeeInfo)
            ->setMetadata($metadata)
            ->setOrderItems($orderItems)
            ->setPayer($payer)
            ->setPayerReference('payer@refrence.no');

        $paymentOrderObject = new PaymentorderObject();
        $paymentOrderObject->setPaymentorder($paymentOrder);

        $purchaseRequest = new Purchase($paymentOrderObject);
        $purchaseRequest->setClient($this->getClient());

        /** @var ResponseServiceInterface $responseService */
        $responseService = $purchaseRequest->send();
        $responseData = $responseService->getResponseData();

        // phpcs:disable
        session_start();
        $_SESSION['payment_order_id'] = $responseData['payment_order']['id'];

        $redirectUrl = $responseService->getOperationByRel('redirect-paymentorder', 'href');
        header('Location: ' . $redirectUrl);
        exit();
        // phpcs:enable
    }
}

new CheckoutStand();
