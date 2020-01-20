<?php

namespace SwedbankPay\Framework\Data;

interface DataTransferObjectInterface extends SimpleDataObjectInterface
{
    /**
     * Return Data Object data in JSON format.
     *
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     * @return array
     */
    public function __toJson();
}
