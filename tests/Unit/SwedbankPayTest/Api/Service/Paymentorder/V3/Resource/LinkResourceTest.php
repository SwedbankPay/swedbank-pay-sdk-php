<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Aborted;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Cancelled;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\LinkResourceInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Failed;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\FailedAttempts;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\History;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Metadata;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\OrderItems;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\PayeeInfo;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Payer;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\PostPurchaseFailedAttempts;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Reversed;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Urls;

/**
 * Verifies the 12 link-only sub-resources of the v3.1 paymentOrder. Each one extends the
 * shared {@see LinkResourceTrait} and exposes only `getId/setId` until expanded.
 */
class LinkResourceTest extends TestCase
{
    /**
     * @dataProvider linkResourceClassProvider
     */
    public function testData($linkResourceClass)
    {
        /** @var LinkResourceInterface $object */
        $object = new $linkResourceClass();

        $this->assertInstanceOf(LinkResourceInterface::class, $object);
        $this->assertNull($object->getId());

        $this->assertInstanceOf($linkResourceClass, $object->setId('/psp/paymentorders/abc/x'));
        $this->assertEquals('/psp/paymentorders/abc/x', $object->getId());
    }

    public function linkResourceClassProvider()
    {
        return [
            'aborted'                     => [Aborted::class],
            'cancelled'                   => [Cancelled::class],
            'failed'                      => [Failed::class],
            'failed attempts'             => [FailedAttempts::class],
            'history'                     => [History::class],
            'metadata'                    => [Metadata::class],
            'order items'                 => [OrderItems::class],
            'payee info'                  => [PayeeInfo::class],
            'payer'                       => [Payer::class],
            'post-purchase failed attempts' => [PostPurchaseFailedAttempts::class],
            'reversed'                    => [Reversed::class],
            'urls'                        => [Urls::class],
        ];
    }
}
