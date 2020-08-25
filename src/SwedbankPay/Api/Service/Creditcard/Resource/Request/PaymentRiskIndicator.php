<?php


namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentRiskIndicatorInterface;
use SwedbankPay\Api\Service\Resource;

class PaymentRiskIndicator extends Resource implements PaymentRiskIndicatorInterface
{
    /**
     * @return string
     */
    public function getDeliveryEmailAddress()
    {
        return $this->offsetGet(self::DELIVERY_EMAIL_ADDRESS);
    }

    /**
     * @param string $deliveryEmailAddress
     * @return $this
     */
    public function setDeliveryEmailAddress($deliveryEmailAddress)
    {
        return $this->offsetSet(self::DELIVERY_EMAIL_ADDRESS, $deliveryEmailAddress);
    }

    /**
     * @return string
     */
    public function getDeliveryTimeFrameIndicator()
    {
        return $this->offsetGet(self::DELIVERY_TIME_FRAME_INDICATOR);
    }

    /**
     * @param string $deliveryTimeFrameIndicator
     * @return $this
     *
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function setDeliveryTimeFrameIndicator($deliveryTimeFrameIndicator)
    {
        return $this->offsetSet(self::DELIVERY_TIME_FRAME_INDICATOR, $deliveryTimeFrameIndicator);
    }

    /**
     * @return string
     */
    public function getPreOrderDate()
    {
        return $this->offsetGet(self::PRE_ORDER_DATE);
    }

    /**
     * @param string $preOrderDate
     * @return $this
     */
    public function setPreOrderDate($preOrderDate)
    {
        return $this->offsetSet(self::PRE_ORDER_DATE, $preOrderDate);
    }

    /**
     * @return string
     */
    public function getPreOrderPurchaseIndicator()
    {
        return $this->offsetGet(self::PRE_ORDER_PURCHASE_INDICATOR);
    }

    /**
     * @param string $preOrderPurchaseIndicator
     * @return $this
     *
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function setPreOrderPurchaseIndicator($preOrderPurchaseIndicator)
    {
        return $this->offsetSet(self::PRE_ORDER_PURCHASE_INDICATOR, $preOrderPurchaseIndicator);
    }

    /**
     * @return string
     */
    public function getShipIndicator()
    {
        return $this->offsetGet(self::SHIP_INDICATOR);
    }

    /**
     * @param string $shipIndicator
     * @return $this
     */
    public function setShipIndicator($shipIndicator)
    {
        return $this->offsetSet(self::SHIP_INDICATOR, $shipIndicator);
    }

    /**
     * @return bool
     */
    public function isGiftCardPurchase()
    {
        return $this->offsetGet(self::GIFT_CARD_PURCHASE);
    }

    /**
     * @param bool $giftCardPurchase
     * @return $this
     */
    public function setGiftCardPurchase($giftCardPurchase)
    {
        return $this->offsetSet(self::GIFT_CARD_PURCHASE, $giftCardPurchase);
    }

    /**
     * @return string
     */
    public function getReOrderPurchaseIndicator()
    {
        return $this->offsetGet(self::RE_ORDER_PURCHASE_INDICATOR);
    }

    /**
     * @param string $reOrderPurchaseIndicator
     * @return $this
     *
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function setReOrderPurchaseIndicator($reOrderPurchaseIndicator)
    {
        return $this->offsetSet(self::RE_ORDER_PURCHASE_INDICATOR, $reOrderPurchaseIndicator);
    }
}
