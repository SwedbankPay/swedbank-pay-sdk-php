<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\AbortedInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\CancelledInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\FailedAttemptsInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\FailedInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\FinancialTransactionsInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\HistoryInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\MetadataInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\OrderItemsInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PaidInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PayeeInfoInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PayerInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PaymentOrderInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PostPurchaseFailedAttemptsInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\ReversedInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\UrlsInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;
use SwedbankPay\Framework\DataObjectCollection;

/**
 * Top-level `paymentOrder` object as it appears in every Online Payments v3.1 response.
 *
 * Note: the class basename is intentionally `PaymentOrder` (capital O) so the
 * ResourceFactory's name-based recursion can auto-resolve the JSON key `paymentOrder`
 * to this class. It does NOT collide with the v2 `Paymentorder\Resource\Request\Paymentorder`
 * class because of the distinct namespace.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 */
class PaymentOrder extends ResponseResource implements PaymentOrderInterface
{
    use LinkResourceTrait;

    /** @return string|null */
    public function getCreated()
    {
        return $this->offsetGet(self::CREATED);
    }

    /** @return string|null */
    public function getUpdated()
    {
        return $this->offsetGet(self::UPDATED);
    }

    /** @return string|null */
    public function getOperation()
    {
        return $this->offsetGet(self::OPERATION);
    }

    /** @return string|null */
    public function getStatus()
    {
        return $this->offsetGet(self::STATUS);
    }

    /** @return int|null */
    public function getNumber()
    {
        return $this->offsetGet(self::NUMBER);
    }

    /** @return string|null */
    public function getInstrument()
    {
        return $this->offsetGet(self::INSTRUMENT);
    }

    /** @return string|null */
    public function getCurrency()
    {
        return $this->offsetGet(self::CURRENCY);
    }

    /** @return int|null */
    public function getAmount()
    {
        return $this->offsetGet(self::AMOUNT);
    }

    /** @return int|null */
    public function getVatAmount()
    {
        return $this->offsetGet(self::VAT_AMOUNT);
    }

    /** @return int|null */
    public function getRemainingReversalAmount()
    {
        return $this->offsetGet(self::REMAINING_REVERSAL_AMOUNT);
    }

    /** @return int|null */
    public function getRemainingCaptureAmount()
    {
        return $this->offsetGet(self::REMAINING_CAPTURE_AMOUNT);
    }

    /** @return int|null */
    public function getRemainingCancellationAmount()
    {
        return $this->offsetGet(self::REMAINING_CANCELLATION_AMOUNT);
    }

    /** @return string|null */
    public function getDescription()
    {
        return $this->offsetGet(self::DESCRIPTION);
    }

    /** @return string|null */
    public function getInitiatingSystemUserAgent()
    {
        return $this->offsetGet(self::INITIATING_SYSTEM_USER_AGENT);
    }

    /** @return string|null */
    public function getLanguage()
    {
        return $this->offsetGet(self::LANGUAGE);
    }

    /** @return array|null */
    public function getAvailableInstruments()
    {
        $value = $this->offsetGet(self::AVAILABLE_INSTRUMENTS);

        // ResourceFactory wraps non-assoc arrays in a DataObjectCollection of items;
        // for primitive string lists we want the raw values back.
        if ($value instanceof DataObjectCollection) {
            $items = [];
            foreach ($value->getItems() as $item) {
                $arr = $item->__toArray();
                $items[] = isset($arr[0]) ? $arr[0] : null;
            }
            return $items;
        }

        return $value;
    }

    /** @return string|null */
    public function getImplementation()
    {
        return $this->offsetGet(self::IMPLEMENTATION);
    }

    /** @return string|null */
    public function getIntegration()
    {
        return $this->offsetGet(self::INTEGRATION);
    }

    /** @return bool|null */
    public function getInstrumentMode()
    {
        return $this->offsetGet(self::INSTRUMENT_MODE);
    }

    /** @return bool|null */
    public function getGuestMode()
    {
        return $this->offsetGet(self::GUEST_MODE);
    }

    /** @return OrderItemsInterface|null */
    public function getOrderItems()
    {
        return $this->offsetGet(self::ORDER_ITEMS);
    }

    /** @return UrlsInterface|null */
    public function getUrls()
    {
        return $this->offsetGet(self::URLS);
    }

    /** @return PayeeInfoInterface|null */
    public function getPayeeInfo()
    {
        return $this->offsetGet(self::PAYEE_INFO);
    }

    /** @return PayerInterface|null */
    public function getPayer()
    {
        return $this->offsetGet(self::PAYER);
    }

    /** @return HistoryInterface|null */
    public function getHistory()
    {
        return $this->offsetGet(self::HISTORY);
    }

    /** @return FailedInterface|null */
    public function getFailed()
    {
        return $this->offsetGet(self::FAILED);
    }

    /** @return AbortedInterface|null */
    public function getAborted()
    {
        return $this->offsetGet(self::ABORTED);
    }

    /** @return PaidInterface|null */
    public function getPaid()
    {
        return $this->offsetGet(self::PAID);
    }

    /** @return CancelledInterface|null */
    public function getCancelled()
    {
        return $this->offsetGet(self::CANCELLED);
    }

    /** @return ReversedInterface|null */
    public function getReversed()
    {
        return $this->offsetGet(self::REVERSED);
    }

    /** @return FinancialTransactionsInterface|null */
    public function getFinancialTransactions()
    {
        return $this->offsetGet(self::FINANCIAL_TRANSACTIONS);
    }

    /** @return FailedAttemptsInterface|null */
    public function getFailedAttempts()
    {
        return $this->offsetGet(self::FAILED_ATTEMPTS);
    }

    /** @return PostPurchaseFailedAttemptsInterface|null */
    public function getPostPurchaseFailedAttempts()
    {
        return $this->offsetGet(self::POST_PURCHASE_FAILED_ATTEMPTS);
    }

    /** @return MetadataInterface|null */
    public function getMetadata()
    {
        return $this->offsetGet(self::METADATA);
    }
}
