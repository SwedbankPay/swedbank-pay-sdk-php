<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\ProblemsCollection;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\ProblemInterface;
use SwedbankPay\Api\Service\Resource;

class Problem extends Resource implements ProblemInterface
{
    /**
     * @return string
     */
    public function getType()
    {
        return $this->offsetGet(self::TYPE);
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->offsetSet(self::TYPE, $type);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->offsetGet(self::TITLE);
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->offsetSet(self::TITLE, $title);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->offsetGet(self::STATUS);
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->offsetSet(self::STATUS, $status);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDetail()
    {
        return $this->offsetGet(self::DETAIL);
    }

    /**
     * @param string $detail
     * @return $this
     */
    public function setDetail($detail)
    {
        $this->offsetSet(self::DETAIL, $detail);
        return $this;
    }
    
    /**
     * @return ProblemsCollection
     */
    public function getProblems()
    {
        return $this->offsetGet(self::PROBLEMS);
    }

    /**
     * @param ProblemsCollection $problems
     * @return $this
     */
    public function setProblems($problems)
    {
        $this->offsetSet(self::PROBLEMS, $problems);
        return $this;
    }
}
