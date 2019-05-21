<?php

use PayEx\Api\Service\Paymentorder\Resource\Request\Paymentorder;
use PayEx\Api\Service\Paymentorder\Resource\Collection\ItemsCollection;

use PayEx\Api\Service\Paymentorder\Resource\PaymentorderUrl;
use PayEx\Api\Service\Paymentorder\Resource\PaymentorderPayeeInfo;
use PayEx\Api\Service\Paymentorder\Resource\PaymentorderPayer;
use PayEx\Api\Service\Paymentorder\Resource\PaymentorderMetadata;
use PayEx\Api\Service\Paymentorder\Resource\PaymentorderCreditCard;
use PayEx\Api\Service\Paymentorder\Resource\PaymentorderInvoice;
use PayEx\Api\Service\Paymentorder\Resource\PaymentorderCampaignInvoice;
use PayEx\Api\Service\Paymentorder\Resource\PaymentorderSwish;

use PayEx\Api\Service\Paymentorder\Request\Purchase;
use PayEx\Api\Service\Paymentorder\Resource\PaymentorderObject;

use PayEx\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use PayEx\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

class PurchaseTest extends TestCase
{
    protected $purchaseRequest;

    public function testPurchaseRequest()
    {
        $urlData = new PaymentorderUrl();
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
        $payer->setConsumerProfileRef('7d5788219e5bc43350e75ac633e0480ab30ad20f96797a12b96e54da869714c4');

        $metadata = new PaymentorderMetadata();
        $metadata->setKey1('value1')
            ->setKey2(2)
            ->setKey3(3.1)
            ->setKey4(false);

        $creditCard = new PaymentorderCreditCard();
        $creditCard->setNo3DSecure(false)
            ->setNo3DSecureForStoredCard(false)
            ->setRejectCardNot3DSecureEnrolled(false)
            ->setRejectCreditCards(false)
            ->setRejectDebitCards(false)
            ->setRejectConsumerCards(false)
            ->setRejectCorporateCards(false)
            ->setRejectAuthenticationStatusA(false)
            ->setRejectAuthenticationStatusU(false);

        $invoice = new PaymentorderInvoice();
        $invoice->setFeeAmount(1900);

        $campaignInvoice = new PaymentorderCampaignInvoice();
        $campaignInvoice->setCampaignCode('Campaign1')
            ->setFeeAmount(2900);

        $swish = new PaymentorderSwish();
        $swish->setEnableEcomOnly(false);

        $paymentorderItems = new ItemsCollection();
        $paymentorderItems->addItem([
            'credit_card' => $creditCard,
            'invoice' => $invoice,
            'campaign_invoice' => $campaignInvoice,
            'swish' => $swish
        ]);

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
            ->setItems($paymentorderItems);

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
        $this->assertTrue(isset($result['operations']));
        $this->assertTrue(($result['payment_order']['operation']) === 'Purchase');
    }
}
