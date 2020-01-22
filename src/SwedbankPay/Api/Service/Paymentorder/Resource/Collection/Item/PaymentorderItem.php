<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item;

use SwedbankPay\Framework\DataObjectCollectionItem;

use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderCampaignInvoiceInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderCreditcardInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderInvoiceInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\Data\PaymentorderItemInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderSwishInterface;

/**
 * Payment order items data object
 */
class PaymentorderItem extends DataObjectCollectionItem implements PaymentorderItemInterface
{

    /**
     * @return PaymentorderCreditcardInterface
     */
    public function getCreditCard()
    {
        return $this->offsetGet(self::CREDIT_CARD);
    }

    /**
     * @param PaymentorderCreditcardInterface $creditCard
     * @return $this
     */
    public function setCreditCard($creditCard)
    {
        return $this->offsetSet(self::CREDIT_CARD, $creditCard);
    }

    /**
     * @return PaymentorderInvoiceInterface
     */
    public function getInvoice()
    {
        return $this->offsetGet(self::INVOICE);
    }

    /**
     * @param PaymentorderInvoiceInterface $invoice
     * @return $this
     */
    public function setInvoice($invoice)
    {
        return $this->offsetSet(self::INVOICE, $invoice);
    }

    /**
     * @return PaymentorderCampaignInvoiceInterface
     */
    public function getCampaignInvoice()
    {
        return $this->offsetGet(self::CAMPAIGN_INVOICE);
    }

    /**
     * @param PaymentorderCampaignInvoiceInterface $campaignInvoice
     * @return $this
     */
    public function setCampaignInvoice($campaignInvoice)
    {
        return $this->offsetSet(self::CAMPAIGN_INVOICE, $campaignInvoice);
    }

    /**
     * @return PaymentorderSwishInterface
     */
    public function getSwish()
    {
        return $this->offsetGet(self::SWISH);
    }

    /**
     * @param PaymentorderSwishInterface $swish
     * @return $this
     */
    public function setSwish($swish)
    {
        return $this->offsetSet(self::SWISH, $swish);
    }
}
