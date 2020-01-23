<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\ProblemsCollection;

interface ProblemInterface
{
    const TYPE = 'type';
    const TITLE = 'title';
    const STATUS = 'status';
    const DETAIL = 'detail';
    const PROBLEMS = 'problems';

    /**
    * @return string
    */
    public function getType();
    
    /**
    * @param string $type
    * @return $this
    */
    public function setType($type);
    
    /**
    * @return string
    */
    public function getTitle();
    
    /**
    * @param string $title
    * @return $this
    */
    public function setTitle($title);
    
    /**
    * @return int
    */
    public function getStatus();
    
    /**
    * @param int $status
    * @return $this
    */
    public function setStatus($status);
    
    /**
    * @return string
    */
    public function getDetail();
    
    /**
    * @param string $detail
    * @return $this
    */
    public function setDetail($detail);
    
    /**
    * @return ProblemsCollection
    */
    public function getProblems();
    
    /**
    * @param ProblemsCollection $problems
    * @return $this
    */
    public function setProblems($problems);
}
