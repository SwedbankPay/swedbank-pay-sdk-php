<?php

namespace PayEx;

class Px
{
    /** @var array SOAP Options */
    protected $_options = array();

    /** @var bool PayEx Debug mode */
    protected $_debug_mode = true;

    /** @var string PayEx Account Number */
    protected $_account_number = '';

    /** @var string Encryption Key */
    protected $_encryption_key = '';

    /** @see http://www.payexpim.com/technical-reference/wsdl/wsdl-files/ */
    /** @var array WSDL Files */
    protected static $_wsdl = array(
        'PxOrderWSDL' => '',
        'PxVerificationWSDL' => '',
        'PxAgreementWSDL' => '',
        'PxRecurringWSDL' => '',
        'PxConfinedWSDL' => ''
    );

    /** @var array PayEx SOAP API List */
    protected static $_rules = array(
        /** @see http://www.payexpim.com/category/pxorder/ */
        'PxOrderWSDL' => array(
            'AddOrderAddress2', 'AddSingleOrderLine2', 'AuthorizeEVC', 'AuthorizeGC', 'AuthorizeInvoice',
            'AuthorizeInvoiceLedger', 'Cancel2', 'Capture5', 'Check2', 'Complete', 'Credit5', 'CreditOrderLine3',
            'FinalizeTransaction', 'GetAddressByPaymentMethod', 'GetApprovedDeliveryAddress', 'GetLowestMonthlyInvoiceSaleAmount',
            'GetTransactionDetails2', 'Initialize8', 'InvoiceLinkGet', 'PrepareAuthorizeDD', 'PrepareSaleDD2', 'PurchaseActivate',
            'PurchaseFinancingInvoice', 'PurchaseInvoiceCorporate', 'PurchaseInvoicePrivate', 'PurchaseInvoiceSale',
            'PurchasePartPaymentSale', 'PurchaseOTT', 'PurchaseInvoicePartPaymentSale', 'PurchasePX', 'SaleEVC',
            'SaleInvoiceLedger', 'SaleGC', 'PurchaseWyWallet', 'PreparePurchaseWyWallet', 'PurchaseCreditAccount'
        ),
        /** @see http://www.payexpim.com/category/pxverification/ */
        'PxVerificationWSDL' => array(
            'CreditCheckCorporate2', 'CreditCheckPrivate2', 'GetConsumerLegalAddress', 'NameCheckPrivate'
        ),
        /** @see http://www.payexpim.com/category/pxagreement/ */
        'PxAgreementWSDL' => array(
            'ActivatePxAgreement', 'AutoPay3', 'AgreementCheck', 'CreateAgreement3', 'DeleteAgreement'
        ),
        /** @see http://www.payexpim.com/category/pxagreement/ */
        'PxRecurringWSDL' => array(
            'Check', 'Start', 'Stop'
        ),
        /** @see http://www.payexpim.com/category/pxconfined/ */
        'PxConfinedWSDL' => array(
            'PreparePurchaseCC', 'PurchaseCC'
        )
    );

    /**
     * Constructor
     * @param array $options
     */
    public function __construct($options = array())
    {
        // SSL Verification option
        if (isset($options['ssl_verify'])) {
            if (!$options['ssl_verify']) {
                $context = stream_context_create(array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'allow_self_signed' => true
                    )
                ));
                $options['stream_context'] = $context;
            }

            unset($options['ssl_verify']);
        }

        $this->_options = $options;
    }

    /**
     * Set PayEx Environment
     * @param string $account
     * @param string $key
     * @param bool $debug
     */
    public function setEnvironment($account, $key, $debug = true)
    {
        $this->_account_number = $account;
        $this->_encryption_key = $key;
        $this->_debug_mode = $debug;

        // Init WSDL
        $this->initWSDL($this->_debug_mode);
    }

    /**
     * Init WSDL Values
     * @param bool $debug_mode
     */
    protected function initWSDL($debug_mode)
    {
        self::$_wsdl['PxOrderWSDL'] = 'https://test-external.payex.com/pxorder/pxorder.asmx?WSDL';
        self::$_wsdl['PxConfinedWSDL'] = 'https://test-confined.payex.com/PxConfined/pxorder.asmx?WSDL';
        self::$_wsdl['PxVerificationWSDL'] = 'https://test-external.payex.com/PxVerification/pxverification.asmx?WSDL';
        self::$_wsdl['PxAgreementWSDL'] = 'https://test-external.payex.com/pxagreement/pxagreement.asmx?WSDL';
        self::$_wsdl['PxRecurringWSDL'] = 'https://test-external.payex.com/pxagreement/pxrecurring.asmx?WSDL';

        // Set Live environment
        if (!$debug_mode) {
            self::$_wsdl['PxOrderWSDL'] = 'https://external.payex.com/pxorder/pxorder.asmx?WSDL';
            self::$_wsdl['PxConfinedWSDL'] = 'https://confined.payex.com/PxConfined/pxorder.asmx?WSDL';
            self::$_wsdl['PxVerificationWSDL'] = 'https://external.payex.com/pxverification/pxverification.asmx?WSDL';
            self::$_wsdl['PxAgreementWSDL'] = 'https://external.payex.com/pxagreement/pxagreement.asmx?WSDL';
            self::$_wsdl['PxRecurringWSDL'] = 'https://external.payex.com/pxagreement/pxrecurring.asmx?WSDL';
        }
    }

    /**
     * Get WSDL File
     * @param $px_function
     * @return bool
     */
    protected function getWSDL($px_function)
    {
        foreach (self::$_rules as $wsdl_type => $function_list) {
            if (in_array($px_function, $function_list)) {
                return self::$_wsdl[$wsdl_type];
            }
        }
        return false;
    }

    /**
     * Parse PayEx XML Response
     * @param $xml_body
     * @return array|bool
     */
    protected function parseFields($xml_body)
    {
        // Load XML
        libxml_use_internal_errors(true);
        $doc = new \DOMDocument();
        $status = @$doc->loadXML($xml_body);
        if ($status === false) {
            return false;
        }

        $result = array();
        $blacklisted = array('header', 'id', 'status');
        $items = $doc->getElementsByTagName('payex')->item(0)->getElementsByTagName('*');
        foreach ($items as $item) {
            $key = $item->nodeName;
            $value = $item->nodeValue;
            if (!in_array($key, $blacklisted)) {
                $result[$key] = $value;
            }
        }

        // Get Status codes for corrected result.
        $items = $doc->getElementsByTagName('payex')->item(0)->getElementsByTagName('status')->item(0)->getElementsByTagName('*');
        foreach ($items as $item) {
            $key = $item->nodeName;
            $value = $item->nodeValue;
            $result[$key] = $value;
        }
        return $result;
    }

    /**
     * Magic Method: Call PayEx Function
     * @param $px_function
     * @param $arguments
     * @return array|bool
     * @throws \Exception
     */
    public function __call($px_function, $arguments)
    {
        if (empty($this->_account_number) || empty($this->_encryption_key)) {
            throw new \Exception('Account number or Encryption key not defined. Use setEnvironment().');
        }

        $wsdl = $this->getWSDL($px_function);
        if (!$wsdl || empty($wsdl)) {
            throw new \Exception('Unknown PayEx Method.');
        }

        if (!isset($arguments[0]) || !is_array($arguments[0])) {
            throw new \Exception('Invalid PayEx Method params.');
        }

        // Set Account Number param automatically
        if (isset($arguments[0]['accountNumber']) && empty($arguments[0]['accountNumber'])) {
            $arguments[0]['accountNumber'] = $this->_account_number;
        }

        // AgreementCheck used as "Check"
        if ($px_function === 'AgreementCheck') {
            $px_function = 'Check';
        }

        // Add Hash to Params
        $arguments[0]['hash'] = $this->getHash($arguments[0]);

        // Call PayEx Method
        $client = new \SoapClient($wsdl, $this->_options);
        $result = $client->__soapCall($px_function, $arguments);
        if (!property_exists($result, $px_function . 'Result')) {
            throw new \Exception('Invalid PayEx Response.');
        }
        $result = $result->{$px_function . 'Result'};
        $result = $this->parseFields($result);
        if (!$result) {
            throw new \Exception('Failed to parse PayEx Response.');
        }

        return $result;
    }

    /**
     * Get Hash Params
     *
     * Hexadecimal md5 hash built up by the value of the following parameters (for Initialize7):
     * accountNumber + purchaseOperation + price + priceArgList + currency + vat + orderID +
     * productNumber + description + clientIPAddress + clientIdentifier + additionalValues +
     * externalID + returnUrl + view + agreementRef + cancelUrl + clientLanguage
     *
     * All parameters are added together – the ‘plus’ character is not included.
     * In addition the encryption key must be included at the end of the string before performing the md5-hash.
     * @param array $params
     * @return string
     */
    protected function getHash($params)
    {
        $params = trim(implode('', $params));
        return strtoupper(md5($params . $this->_encryption_key));
    }

}