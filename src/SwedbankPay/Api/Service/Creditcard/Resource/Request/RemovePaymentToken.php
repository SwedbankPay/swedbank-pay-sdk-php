<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\RemovePaymentTokenInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Remove payment token object
 */
class RemovePaymentToken extends Resource implements RemovePaymentTokenInterface
{
    /**
     * @return string
     */
    public function getState()
    {
        return $this->offsetGet(self::STATE);
    }

    /**
     * @param string $state
     * @return $this
     */
    public function setState($state)
    {
        return $this->offsetSet(self::STATE, $state);
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->offsetGet(self::COMMENT);
    }

    /**
     * @param string $comment
     * @return $this
     */
    public function setComment($comment)
    {
        return $this->offsetSet(self::COMMENT, $comment);
    }
}
