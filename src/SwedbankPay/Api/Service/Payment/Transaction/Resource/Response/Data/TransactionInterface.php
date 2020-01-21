<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface TransactionInterface extends TransactionResourceInterface
{
    const CREATED = 'created';
    const UPDATED = 'updated';
    const TYPE = 'type';
    const STATE = 'state';
    const NUMBER = 'number';
    const AMOUNT = 'amount';
    const VAT_AMOUNT = 'vat_amount';
    const DESCRIPTION = 'description';
    const PAYEE_REFERENCE = 'payee_reference';
    const FAILED_REASON = 'failed_reason';
    const FAILED_ACTIVITY_NAME = 'failed_activity_name';
    const FAILED_ERROR_CODE = 'failed_error_code';
    const FAILED_ERROR_DESCRIPTION = 'failed_error_description';
    const IS_OPERATIONAL = 'is_operational';
    const PROBLEM = 'problem';

    /**
    * @return string
    */
    public function getCreated();
    
    /**
    * @param string $created
    * @return $this
    */
    public function setCreated($created);
    
    /**
    * @return string
    */
    public function getUpdated();
    
    /**
    * @param string $updated
    * @return $this
    */
    public function setUpdated($updated);
    
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
    public function getState();
    
    /**
    * @param string $state
    * @return $this
    */
    public function setState($state);
    
    /**
    * @return int
    */
    public function getNumber();
    
    /**
    * @param int $number
    * @return $this
    */
    public function setNumber($number);
    
    /**
    * @return int
    */
    public function getAmount();
    
    /**
    * @param int $amount
    * @return $this
    */
    public function setAmount($amount);
    
    /**
    * @return int
    */
    public function getVatAmount();
    
    /**
    * @param int $vatAmount
    * @return $this
    */
    public function setVatAmount($vatAmount);
    
    /**
    * @return string
    */
    public function getDescription();
    
    /**
    * @param string $description
    * @return $this
    */
    public function setDescription($description);
    
    /**
    * @return string
    */
    public function getPayeeReference();
    
    /**
    * @param string $payeeReference
    * @return $this
    */
    public function setPayeeReference($payeeReference);
    
    /**
    * @return string
    */
    public function getFailedReason();
    
    /**
    * @param string $failedReason
    * @return $this
    */
    public function setFailedReason($failedReason);
    
    /**
    * @return string
    */
    public function getFailedActivityName();
    
    /**
    * @param string $failedActivityName
    * @return $this
    */
    public function setFailedActivityName($failedActivityName);
    
    /**
    * @return string
    */
    public function getFailedErrorCode();
    
    /**
    * @param string $failedErrorCode
    * @return $this
    */
    public function setFailedErrorCode($failedErrorCode);
    
    /**
    * @return string
    */
    public function getFailedErrorDescription();
    
    /**
    * @param string $failedErrorDesc
    * @return $this
    */
    public function setFailedErrorDescription($failedErrorDesc);
    
    /**
     * @return bool
     * @SuppressWarnings(PHPMD.BooleanGetMethodName)
     */
    public function getIsOperational();
    
    /**
    * @param bool $isOperational
    * @return $this
    */
    public function setIsOperational($isOperational);
    
    /**
    * @return ProblemInterface
    */
    public function getProblem();
    
    /**
    * @param ProblemInterface $problem
    * @return $this
    */
    public function setProblem($problem);
}
