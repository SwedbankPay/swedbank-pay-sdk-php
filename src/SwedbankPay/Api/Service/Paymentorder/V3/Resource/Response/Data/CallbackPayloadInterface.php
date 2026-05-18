<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\Data;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PaymentOrderInterface;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface;

/**
 * Webhook callback body delivered by Swedbank Pay for v3.1 paymentOrder events.
 *
 * Shape:
 * ```
 * {
 *   "orderReference": "PO-123...",
 *   "paymentOrder": { "id": "...", "instrument": "CreditCard", "number": 40129161258 }
 * }
 * ```
 *
 * Note that v3.1 dropped the v2 top-level `payment` and `transaction` fields — order
 * lookup must use `orderReference` (or fall back to the paymentOrder id).
 *
 * @api
 */
interface CallbackPayloadInterface extends ResponseInterface
{
    const ORDER_REFERENCE = 'order_reference';
    const PAYMENT_ORDER = 'payment_order';

    /** @return string|null */
    public function getOrderReference();

    /**
     * The slim paymentOrder reference from the callback body. Only `id`, `instrument`,
     * and `number` are populated by the webhook — call `getId()` / `getNumber()` /
     * `getInstrument()` on the returned object.
     *
     * @return PaymentOrderInterface|null
     */
    public function getPaymentOrder();
}
