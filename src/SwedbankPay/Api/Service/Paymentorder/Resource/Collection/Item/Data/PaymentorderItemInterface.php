<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\Data;

use SwedbankPay\Framework\Data\DataObjectCollectionItemInterface;

use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderCampaignInvoiceInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderCreditcardInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderInvoiceInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderSwishInterface;

/**
 * Payment order items interface
 *
 * @api
 */
interface PaymentorderItemInterface extends DataObjectCollectionItemInterface
{
    const CREDIT_CARD = 'credit_card';
    const INVOICE = 'invoice';
    const CAMPAIGN_INVOICE = 'campaign_invoice';
    const SWISH = 'swish';

    /**
     * @return PaymentorderCreditcardInterface
     */
    public function getCreditCard();

    /**
     * @param PaymentorderCreditcardInterface $creditCard
     * @return $this
     */
    public function setCreditCard($creditCard);

    /**
     * @return PaymentorderInvoiceInterface
     */
    public function getInvoice();

    /**
     * @param PaymentorderInvoiceInterface $invoice
     * @return $this
     */
    public function setInvoice($invoice);

    /**
     * @return PaymentorderCampaignInvoiceInterface
     */
    public function getCampaignInvoice();

    /**
     * @param PaymentorderCampaignInvoiceInterface $campaignInvoice
     * @return $this
     */
    public function setCampaignInvoice($campaignInvoice);

    /**
     * @return PaymentorderSwishInterface
     */
    public function getSwish();

    /**
     * @param PaymentorderSwishInterface $swish
     * @return $this
     */
    public function setSwish($swish);
}
