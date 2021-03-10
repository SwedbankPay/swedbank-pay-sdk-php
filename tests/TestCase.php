<?php

use SwedbankPay\Api\Client\Client;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayer;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderObject;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderUrl as PaymentorderUrlData;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayeeInfo;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;
use SwedbankPay\Api\Service\Paymentorder\Request\Purchase;
use SwedbankPay\Api\Service\Paymentorder\Request\GetCurrentPayment;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /** @var Client $client */
    protected $client;

    protected function setUp(): void
    {
        if (!defined('ACCESS_TOKEN') ||
            ACCESS_TOKEN === '<access_token>') {
            $this->fail('ACCESS_TOKEN not configured in INI file or environment variable.');
        }

        if (!defined('PAYEE_ID') ||
            PAYEE_ID === '<payee_id>') {
            $this->fail('PAYEE_ID not configured in INI file or environment variable.');
        }

        $this->client = new Client();
        $this->client->setAccessToken(ACCESS_TOKEN)
            ->setPayeeId(PAYEE_ID)
            ->setMode(Client::MODE_TEST);
    }

    protected function tearDown(): void
    {
        $this->client = null;
    }

    /**
     * @param $length
     * @return bool|string
     */
    protected function generateRandomString($length)
    {
        return substr(str_shuffle(md5(time())), 0, $length);
    }

    /**
     * @return string|null
     * @throws \SwedbankPay\Api\Client\Exception
     */
    protected function getPaymentOrderId()
    {
        return $this->createPaymentOrder()->getResponseData()['payment_order']['id'];
    }

    /**
     * @return mixed
     * @throws \SwedbankPay\Api\Client\Exception
     */
    protected function getPaymentToken()
    {
        $currentPayment = new GetCurrentPayment();
        $currentPayment->setClient($this->client)
            ->setRequestEndpoint($this->getPaymentOrderId() . '/currentPayment');

        $response = $currentPayment->send();

        return $response['payment']['payment_token'];
    }

    /**
     * @return \SwedbankPay\Api\Service\Data\ResponseInterface
     * @throws \SwedbankPay\Api\Client\Exception
     */
    private function createPaymentOrder()
    {
        $urlData = new PaymentorderUrlData();
        $urlData->setHostUrls(['https://example.com', 'https://example.net'])
            ->setCompleteUrl('https://example.com/payment-completed')
            ->setCancelUrl('https://example.com/payment-canceled')
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
        $payer->setEmail('olivia.nyhuus@payex.com')
            ->setMsisdn('+4798765432')
            ->setWorkPhoneNumber('+4787654321')
            ->setHomePhoneNumber('+4776543210');

        $paymentOrder = new Paymentorder();
        $paymentOrder->setOperation('Purchase')
            ->setCurrency('NOK')
            ->setAmount('1500')
            ->setVatAmount(0)
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('nb-NO')
            ->setGeneratePaymentToken(false)
            ->setDisablePaymentMenu(false)
            ->setUrls($urlData)
            ->setPayeeInfo($payeeInfo)
            ->setPayer($payer);

        $paymentOrderObject = new PaymentorderObject();
        $paymentOrderObject->setPaymentorder($paymentOrder);

        $purchaseRequest = new Purchase($paymentOrderObject);
        $purchaseRequest->setClient($this->client);

        return $purchaseRequest->send();
    }

    /**
     * Get Payment Id from url
     * @param string $url
     * @return string
     */
    protected function getPaymentIdFromUrl($url)
    {
        return preg_replace('|/psp/[^/]+/payments/|', '', $url);
    }
}
