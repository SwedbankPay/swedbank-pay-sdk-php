<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Capture;
use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\ItemDescriptionListCollection;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\VatSummaryCollection;

class CaptureTest extends TestCase
{
    public function testData()
    {
        $object = new Capture();

        $this->assertInstanceOf(
            Capture::class,
            $object->setActivity('test')
        );
        $this->assertEquals('test', $object->getActivity());

        $this->assertInstanceOf(
            Capture::class,
            $object->setItemDescriptions(new ItemDescriptionListCollection())
        );
        $this->assertInstanceOf(ItemDescriptionListCollection::class, $object->getItemDescriptions());

        $this->assertInstanceOf(
            Capture::class,
            $object->setVatSummary(new VatSummaryCollection())
        );
        $this->assertInstanceOf(VatSummaryCollection::class, $object->getVatSummary());

        $this->assertInstanceOf(
            Capture::class,
            $object->setReceiptReference('test')
        );
        $this->assertEquals('test', $object->getReceiptReference());
    }
}
