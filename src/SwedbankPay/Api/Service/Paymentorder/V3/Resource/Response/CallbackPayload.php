<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PaymentOrderInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\PaymentOrder;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\Data\CallbackPayloadInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * Typed parser for v3.1 callback (webhook) bodies.
 *
 * Construction is direct from the raw webhook JSON:
 * ```php
 * $payload = new CallbackPayload($webhookBody);
 * $orderRef = $payload->getOrderReference();
 * $paymentOrderId = $payload->getPaymentOrder()->getId();
 * $number = $payload->getPaymentOrder()->getNumber();
 * ```
 *
 * Unlike API responses, callback payloads do not flow through `Request::send()`, so this
 * class promotes the nested `paymentOrder` to the typed DTO directly in its constructor.
 */
class CallbackPayload extends ResponseResource implements CallbackPayloadInterface
{
    /**
     * @param array|string $data Raw webhook body as parsed array or JSON string.
     */
    public function __construct($data = [])
    {
        // Re-encode arrays as JSON so the parent constructor's snake-casing path runs
        // uniformly regardless of whether the consumer pre-decoded the body.
        if (is_array($data)) {
            $data = json_encode($data);
        }

        parent::__construct($data);

        $paymentOrder = $this->offsetGet(self::PAYMENT_ORDER);
        if (is_array($paymentOrder)) {
            $this->offsetSet(self::PAYMENT_ORDER, new PaymentOrder($paymentOrder));
        }
    }

    /** @return string|null */
    public function getOrderReference()
    {
        return $this->offsetGet(self::ORDER_REFERENCE);
    }

    /** @return PaymentOrderInterface|null */
    public function getPaymentOrder()
    {
        return $this->offsetGet(self::PAYMENT_ORDER);
    }
}
