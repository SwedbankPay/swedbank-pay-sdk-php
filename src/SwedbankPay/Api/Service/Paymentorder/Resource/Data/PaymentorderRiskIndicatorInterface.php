<?php


namespace SwedbankPay\Api\Service\Paymentorder\Resource\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

interface PaymentorderRiskIndicatorInterface extends ResourceInterface
{
    const DELIVERY_EMAIL_ADDRESS = "delivery_email_address";
    const DELIVERY_TIME_FRAME_INDICATOR = "delivery_time_frame_indicator";
    const PRE_ORDER_DATE = "pre_order_date";
    const PRE_ORDER_PURCHASE_INDICATOR = "pre_order_purchase_indicator";
    const SHIP_INDICATOR = "ship_indicator";
    const GIFT_CARD_PURCHASE = "gift_card_purchase";
    const RE_ORDER_PURCHASE_INDICATOR = "re_order_purchase_indicator";

    /**
     * @return string
     */
    public function getDeliveryEmailAddress();

    /**
     * @param string $deliveryEmailAddress
     * @return $this
     */
    public function setDeliveryEmailAddress($deliveryEmailAddress);

    /**
     * @return string
     */
    public function getDeliveryTimeFrameIndicator();

    /**
     * @param string $deliveryTimeFrameIndicator
     * @return $this
     *
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function setDeliveryTimeFrameIndicator($deliveryTimeFrameIndicator);

    /**
     * @return string
     */
    public function getPreOrderDate();

    /**
     * @param string $preOrderDate
     * @return $this
     */
    public function setPreOrderDate($preOrderDate);

    /**
     * @return string
     */
    public function getPreOrderPurchaseIndicator();

    /**
     * @param string $preOrderPurchaseIndicator
     * @return $this
     *
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function setPreOrderPurchaseIndicator($preOrderPurchaseIndicator);

    /**
     * @return string
     */
    public function getShipIndicator();

    /**
     * @param string $shipIndicator
     * @return $this
     */
    public function setShipIndicator($shipIndicator);

    /**
     * @return bool
     */
    public function isGiftCardPurchase();

    /**
     * @param bool $giftCardPurchase
     * @return $this
     */
    public function setGiftCardPurchase($giftCardPurchase);

    /**
     * @return string
     */
    public function getReOrderPurchaseIndicator();

    /**
     * @param string $reOrderPurchaseIndicator
     * @return $this
     *
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function setReOrderPurchaseIndicator($reOrderPurchaseIndicator);
}
