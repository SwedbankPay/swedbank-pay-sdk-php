<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Payment order campaign invoice interface
 *
 * @api
 */
interface PaymentorderCampaignInvoiceInterface extends ResourceInterface
{
    const CAMPAIGN_CODE = 'campaign_code';
    const FEE_AMOUNT = 'fee_amount';

    /**
     * @return string
     */
    public function getCampaignCode();

    /**
     * @param string $campaignCode
     * @return $this
     */
    public function setCampaignCode($campaignCode);

    /**
     * @return int
     */
    public function getFeeAmount();

    /**
     * @param int $feeAmount
     * @return $this
     */
    public function setFeeAmount($feeAmount);
}
