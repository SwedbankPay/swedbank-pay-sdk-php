<?php

namespace SwedbankPay\Api\Service\Vipps\Transaction\Resource\Collection\Item;

use SwedbankPay\Api\Service\Vipps\Transaction\Resource\Collection\Item\Data\AuthorizationListItemInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\TransactionListItem;

class AuthorizationListItem extends TransactionListItem implements AuthorizationListItemInterface
{
    /**
     * @return string
     */
    public function getVippsTransactionId()
    {
        return $this->offsetGet(self::VIPPS_TRANSACTION_ID);
    }

    /**
     * @param string $vippsTransactionId
     * @return $this
     */
    public function setVippsTransactionId($vippsTransactionId)
    {
        $this->offsetSet(self::VIPPS_TRANSACTION_ID, $vippsTransactionId);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMsisdn()
    {
        return $this->offsetGet(self::MSISDN);
    }

    /**
     * @param string $msisdn
     * @return $this
     */
    public function setMsisdn($msisdn)
    {
        $this->offsetSet(self::MSISDN, $msisdn);
        return $this;
    }
}
