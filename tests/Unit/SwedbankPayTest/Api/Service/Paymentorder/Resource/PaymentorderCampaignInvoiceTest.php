<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderCampaignInvoice;

class PaymentorderCampaignInvoiceTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentorderCampaignInvoice();

        $this->assertInstanceOf(
            PaymentorderCampaignInvoice::class,
            $object->setCampaignCode('test')
        );
        $this->assertEquals('test', $object->getCampaignCode());

        $this->assertInstanceOf(
            PaymentorderCampaignInvoice::class,
            $object->setFeeAmount(125)
        );
        $this->assertEquals(125, $object->getFeeAmount());
    }
}