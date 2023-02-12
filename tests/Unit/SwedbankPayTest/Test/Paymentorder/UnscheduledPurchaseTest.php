<?php
// phpcs:ignoreFile --

namespace SwedbankPayTest\Test\Paymentorder;

use SwedbankPay\Api\Client\Client;
use SwedbankPay\Api\Service\Paymentorder\Request\Verify;
use SwedbankPay\Api\Service\Paymentorder\Request\UnscheduledPurchase;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\OrderItem;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\OrderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderObject;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayeeInfo;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayer;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderUrl;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;
use SwedbankPay\Api\Service\Data\ResponseInterface;
use SwedbankPay\Api\Service\Response;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class UnscheduledPurchaseTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Client&\PHPUnit\Framework\MockObject\MockObject|\PHPUnit\Framework\MockObject\MockObject $client
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = $this->getMockBuilder(Client::class)
                           ->disableOriginalConstructor()
                           ->getMock();

        $this->client->expects($this->any())
                   ->method('getAccessToken')
                   ->willReturn('access-token');

        $this->client->expects($this->any())
                   ->method('getPayeeId')
                   ->willReturn('payee-id');

        $this->client->expects($this->once())
                   ->method('request')
                   ->willReturn($this->client);
    }

    /**
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function testVerify()
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
        $payer->setPayerReference('AB1234');

        $paymentOrder = new Paymentorder();
        $paymentOrder
            ->setOperation('Verify')
            ->setGenerateUnscheduledToken(true)
            ->setGenerateRecurrenceToken(true)
            ->setCurrency('SEK')
            ->setDescription('Verification of Credit Card')
            ->setUserAgent('Mozilla\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/109.0.0.0 Safari\/537.36')
            ->setLanguage('en-US')
            ->setUrls($urlData)
            ->setPayeeInfo($payeeInfo);

        $paymentOrderObject = new PaymentorderObject();
        $paymentOrderObject->setPaymentorder($paymentOrder);

        $purchaseRequest = new Verify($paymentOrderObject);
        $purchaseRequest->setClient($this->client);

        $response = <<<RESPONSE
{
    "paymentOrder": {
        "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82",
        "created": "2023-01-29T06:05:33.9338371Z",
        "updated": "2023-01-29T06:05:34.0231083Z",
        "operation": "Verify",
        "state": "Ready",
        "currency": "EUR",
        "amount": 0,
        "vatAmount": 0,
        "description": "Verification of Credit Card",
        "initiatingSystemUserAgent": "Swedbank Pay PHP SDK/5.4.1 PHP/7.3.33 Mac OS X swedbankpay-woocommerce-checkout/6.4.0Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36",
        "userAgent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36",
        "language": "en-US",
        "availableInstruments": ["CreditCard"],
        "integration": "",
        "urls": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/urls"
        },
        "payeeInfo": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/payeeInfo"
        },
        "metadata": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/metadata"
        },
        "payer": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/payers"
        },
        "payments": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/payments"
        },
        "currentPayment": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/currentpayment"
        },
        "items": [{
            "creditCard": {
                "cardBrands": ["MasterCard", "Visa"]
            }
        }]
    },
    "operations": [{
        "method": "PATCH",
        "href": "https://api.externalintegration.payex.com/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82",
        "rel": "update-paymentorder-updateorder",
        "contentType": "application/json"
    }, {
        "method": "PATCH",
        "href": "https://api.externalintegration.payex.com/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82",
        "rel": "update-paymentorder-abort",
        "contentType": "application/json"
    }, {
        "method": "GET",
        "href": "https://ecom.externalintegration.payex.com/paymentmenu/d7b47fdbd999d1a6b4d1d8aa88d90f879dd3558df0db7f2c48ea15aa29e8f89e",
        "rel": "redirect-paymentorder",
        "contentType": "text/html"
    }, {
        "method": "GET",
        "href": "https://ecom.externalintegration.payex.com/paymentmenu/core/client/paymentmenu/d7b47fdbd999d1a6b4d1d8aa88d90f879dd3558df0db7f2c48ea15aa29e8f89e?culture=en-US",
        "rel": "view-paymentorder",
        "contentType": "application/javascript"
    }]
}
RESPONSE;

        $this->client->expects($this->once())
                     ->method('getResponseBody')
                     ->willReturn($response);

        $result = $purchaseRequest->send();
        $this->assertInstanceOf(Response::class, $result);
        $this->assertInstanceOf(ResponseInterface::class, $result);
    }

    /**
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function testUnscheduledPurchase()
    {
        $urlData = new PaymentorderUrl();
        $urlData->setCallbackUrl('https://api.internaltest.payex.com/psp/fakecallback');

        $payeeInfo = new PaymentorderPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
                  ->setPayeeReference($this->generateRandomString(30))
                  ->setPayeeName('Merchant1')
                  ->setProductCategory('A123')
                  ->setOrderReference('or-123456');

        $payer = new PaymentorderPayer();
        $payer->setPayerReference('AB1234');

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
            ->setOperation('UnscheduledPurchase')
            ->setUnscheduledToken('1e9a6b6c-271b-4345-bb3a-3e0f321a511b')
            ->setIntent('Authorization')
            ->setCurrency('SEK')
            ->setAmount(12500)
            ->setVatAmount(2500)
            ->setDescription('Order #123')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('sv-SE')
            ->setUrls($urlData)
            ->setPayeeInfo($payeeInfo)
            ->setPayer($payer)
            ->setOrderItems($orderItems);

        $paymentOrderObject = new PaymentorderObject();
        $paymentOrderObject->setPaymentorder($paymentOrder);

        $purchaseRequest = new UnscheduledPurchase($paymentOrderObject);
        $purchaseRequest->setClient($this->client);

        $response = <<<RESPONSE
{
    "paymentOrder": {
        "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82",
        "created": "2023-01-29T06:05:33.9338371Z",
        "updated": "2023-01-29T06:05:34.0231083Z",
        "operation": "UnscheduledPurchase",
        "state": "Ready",
        "currency": "EUR",
        "amount": 0,
        "vatAmount": 0,
        "description": "Verification of Credit Card",
        "initiatingSystemUserAgent": "Swedbank Pay PHP SDK/5.4.1 PHP/7.3.33 Mac OS X swedbankpay-woocommerce-checkout/6.4.0Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36",
        "userAgent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36",
        "language": "en-US",
        "availableInstruments": ["CreditCard"],
        "integration": "",
        "urls": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/urls"
        },
        "payeeInfo": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/payeeInfo"
        },
        "metadata": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/metadata"
        },
        "payer": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/payers"
        },
        "payments": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/payments"
        },
        "currentPayment": {
            "id": "/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82/currentpayment"
        },
        "items": [{
            "creditCard": {
                "cardBrands": ["MasterCard", "Visa"]
            }
        }]
    },
    "operations": [{
        "method": "PATCH",
        "href": "https://api.externalintegration.payex.com/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82",
        "rel": "update-paymentorder-updateorder",
        "contentType": "application/json"
    }, {
        "method": "PATCH",
        "href": "https://api.externalintegration.payex.com/psp/paymentorders/f674551d-d636-44fb-e6a0-08daf9fecd82",
        "rel": "update-paymentorder-abort",
        "contentType": "application/json"
    }, {
        "method": "GET",
        "href": "https://ecom.externalintegration.payex.com/paymentmenu/d7b47fdbd999d1a6b4d1d8aa88d90f879dd3558df0db7f2c48ea15aa29e8f89e",
        "rel": "redirect-paymentorder",
        "contentType": "text/html"
    }, {
        "method": "GET",
        "href": "https://ecom.externalintegration.payex.com/paymentmenu/core/client/paymentmenu/d7b47fdbd999d1a6b4d1d8aa88d90f879dd3558df0db7f2c48ea15aa29e8f89e?culture=en-US",
        "rel": "view-paymentorder",
        "contentType": "application/javascript"
    }]
}
RESPONSE;

        $this->client->expects($this->once())
                     ->method('getResponseBody')
                     ->willReturn($response);

        $result = $purchaseRequest->send();
        $this->assertInstanceOf(Response::class, $result);
        $this->assertInstanceOf(ResponseInterface::class, $result);
    }

    /**
     * @param $length
     * @return bool|string
     */
    private function generateRandomString($length)
    {
        return substr(str_shuffle(md5(time())), 0, $length);
    }
}
