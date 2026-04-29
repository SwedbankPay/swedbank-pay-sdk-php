<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Details;

class DetailsTest extends TestCase
{
    public function testData()
    {
        $object = new Details();

        $this->assertNull($object->getNonPaymentToken());
        $this->assertNull($object->getExternalNonPaymentToken());
        $this->assertNull($object->getTransactionsOnFileToken());

        $this->assertNull($object->getCardBrand());
        $this->assertNull($object->getCardType());
        $this->assertNull($object->getMaskedPan());
        $this->assertNull($object->getExpiryDate());
        $this->assertNull($object->getIssuerAuthorizationApprovalCode());
        $this->assertNull($object->getAcquirerTransactionType());
        $this->assertNull($object->getAcquirerStan());
        $this->assertNull($object->getAcquirerTerminalId());
        $this->assertNull($object->getAcquirerTransactionTime());
        $this->assertNull($object->getTransactionInitiator());
        $this->assertNull($object->getBin());
    }

    public function testReadsValuesFromConstructor()
    {
        $object = new Details(json_encode([
            'nonPaymentToken'   => 'token-1',
            'cardBrand'         => 'MasterCard',
            'cardType'          => 'Credit',
            'maskedPan'         => '522661******3406',
            // expiryDate is stored verbatim because the SDK helper does not split it (see DetailsInterface).
            'expiryDate'        => '12/2033',
            'bin'               => '522661',
        ]));

        $this->assertEquals('token-1', $object->getNonPaymentToken());
        $this->assertEquals('MasterCard', $object->getCardBrand());
        $this->assertEquals('Credit', $object->getCardType());
        $this->assertEquals('522661******3406', $object->getMaskedPan());
        $this->assertEquals('12/2033', $object->getExpiryDate());
        $this->assertEquals('522661', $object->getBin());
    }
}
