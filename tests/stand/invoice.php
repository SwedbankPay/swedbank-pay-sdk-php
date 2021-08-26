<?php
// phpcs:ignoreFile -- this is test

use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Payment\Resource\Request\Metadata;
use SwedbankPay\Api\Service\Invoice\Request\CreateInvoice;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Invoice;
use SwedbankPay\Api\Service\Invoice\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Invoice\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Payment;
use SwedbankPay\Api\Service\Invoice\Resource\Request\InvoicePaymentObject;
use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;

// phpcs:disable
require_once __DIR__ . '/abstract.php';
require_once __DIR__ . '/../bootstrap.php';
// phpcs:enable

/**
 * @codeCoverageIgnore
 */
class InvoiceStand extends Stand
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

        $metadata = new Metadata();
        $metadata->setData('order_id', 'or-123456');

        $payment = new Payment();
        $payment->setOperation('FinancingConsumer')
            ->setIntent('Authorization')
            ->setCurrency('SEK')
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('sv-SE')
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo)
            ->setPrices($prices)
            ->setMetadata($metadata);

        $invoice = new Invoice();
        $invoice->setInvoiceType('PayExFinancingSe');

        $invoicePaymentObject = new InvoicePaymentObject();
        $invoicePaymentObject->setPayment($payment);
        $invoicePaymentObject->setInvoice($invoice);

        $invoiceRequest = new CreateInvoice($invoicePaymentObject);
        $invoiceRequest->setClient($this->getClient());

        /** @var ResponseServiceInterface $responseService */
        $responseService = $invoiceRequest->send();
        $responseData = $responseService->getResponseData();

        // phpcs:disable
        session_start();
        $_SESSION['payment_id'] = $responseData['payment']['id'];

        $redirectUrl = $responseService->getOperationByRel('redirect-authorization', 'href');
        header('Location: ' . $redirectUrl);
        exit();
        // phpcs:enable
    }
}

new InvoiceStand();
