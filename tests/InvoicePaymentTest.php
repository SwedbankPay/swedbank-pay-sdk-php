<?php

use SwedbankPay\Api\Service\Consumer\Resource\ConsumerAddress;
use SwedbankPay\Api\Service\Invoice\Request\CreateApprovedLegalAddress;
use SwedbankPay\Api\Service\Invoice\Request\CreateInvoice;
use SwedbankPay\Api\Service\Invoice\Resource\Request\AddresseeObject;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Addressee;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Invoice;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Consumer;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Transaction;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Invoice\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Invoice\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Payment;
use SwedbankPay\Api\Service\Invoice\Resource\Request\InvoicePaymentObject;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Invoice\Transaction\Request\CreateAuthorization;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Authorization;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

class InvoicePaymentTest extends TestCase
{
    protected $addressRequest;
    protected $invoiceRequest;
    protected $authorizationRequest;

    /**
     * @throws \SwedbankPay\Api\Client\Exception
     */
    public function testInvoicePaymentRequest()
    {
        $url = new PaymentUrl();
        $url->setCompleteUrl('http://test-dummy.net/payment-completed')
            ->setCancelUrl('http://test-dummy.net/payment-canceled')
            ->setCallbackUrl('http://test-dummy.net/payment-callback')
            ->setLogoUrl('https://example.com/logo.png')
            ->setTermsOfService('https://example.com/terms.pdf');

        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
            ->setPayeeReference($this->generateRandomString(30))
            ->setPayeeName('Merchant1')
            ->setProductCategory('A123')
            ->setOrderReference('or-123456')
            ->setSubsite('MySubsite');

        $price = new PriceItem();
        $price->setType('Invoice')
            ->setAmount(1500)
            ->setVatAmount(0);

        $prices = new PricesCollection();
        $prices->addItem($price);

        $payment = new Payment();
        $payment->setOperation('FinancingConsumer')
            ->setIntent('Authorization')
            ->setCurrency('SEK')
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('sv-SE')
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo)
            ->setPrices($prices);

        $invoice = new Invoice();
        $invoice->setInvoiceType('PayExFinancingSe');

        $invoicePaymentObject = new InvoicePaymentObject();
        $invoicePaymentObject->setPayment($payment);
        $invoicePaymentObject->setInvoice($invoice);
        

        $this->invoiceRequest = new CreateInvoice($invoicePaymentObject);
        $this->invoiceRequest->setClient($this->client);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $this->invoiceRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['payment']));
        $this->assertTrue(isset($result['operations']));
        $this->assertTrue(($result['payment']['operation']) === 'FinancingConsumer');
        $this->assertTrue(($result['payment']['instrument']) === 'Invoice');

        $paymentId = str_replace('/psp/invoice/payments/', '', $result['payment']['id']);
        return $paymentId;
    }

    /**
     * @depends InvoicePaymentTest::testInvoicePaymentRequest
     * @param string $paymentId
     * @throws \SwedbankPay\Api\Client\Exception
     */
    public function testCreateApprovedLegalAddress($paymentId)
    {
        $addressee = new Addressee();
        $addressee->setSocialSecurityNumber('6003071161');
        $addressee->setZipCode('19792');

        $addresseeObject = new AddresseeObject();
        $addresseeObject->setAddressee($addressee);

        $this->addressRequest = new CreateApprovedLegalAddress($addresseeObject);
        $this->addressRequest->setClient($this->client);
        $this->addressRequest->setRequestEndpointVars($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $this->addressRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['payment']));
        $this->assertTrue(isset($result['approved_legal_address']));
        $this->assertTrue(isset($result['approved_legal_address']['addressee']));
    }

    /**
     * @depends InvoicePaymentTest::testInvoicePaymentRequest
     * @param string $paymentId
     * @throws \SwedbankPay\Api\Client\Exception
     */
    public function testCreateAuthorizationTransaction($paymentId)
    {
        $transactionData = new Transaction();
        $transactionData->setActivity('FinancingConsumer');

        $consumerData = new Consumer();
        $consumerData->setSocialSecurityNumber('600307-1161')
                    ->setCustomerNumber('')
                    ->setName('Azra Oliveira')
                    ->setEmail('azra@example.com')
                    ->setMsisdn('+46760000000')
                    ->setIp('83.187.79.188');

        $legalAddressData = new ConsumerAddress();
        $legalAddressData->setAddressee('Azra Oliveira')
                        ->setStreetAddress('Jansson väg 12')
                        ->setZipCode('19792')
                        ->setCity('Bro')
                        ->setCountryCode('SE');

        $billingAddressData = new ConsumerAddress();
        $billingAddressData->setAddressee('Azra Oliveira')
            ->setStreetAddress('Jansson väg 12')
            ->setZipCode('19792')
            ->setCity('Bro')
            ->setCountryCode('SE');

        $transaction = new Authorization();
        $transaction->setTransaction($transactionData)
                    ->setConsumer($consumerData)
                    ->setLegalAddress($legalAddressData)
                    ->setBillingAddress($billingAddressData);

        $this->authorizationRequest = new CreateAuthorization($transaction);
        $this->authorizationRequest->setClient($this->client);
        $this->authorizationRequest->setRequestEndpointVars($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $this->authorizationRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['payment']));
        $this->assertTrue(isset($result['authorization']));
        $this->assertTrue(isset($result['authorization']['transaction']));
        $this->assertTrue(($result['authorization']['transaction']['type']) === 'Authorization');
    }
}
