<?php

namespace SwedbankPay\Framework;

use SwedbankPay\Framework\Data\DataTransferObjectInterface;

/**
 * Base Class for data transfer objects
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
abstract class AbstractDataTransferObject extends AbstractSimpleDataObject implements DataTransferObjectInterface
{
    /** @var DataObjectHelper $helper */
    protected $helper;

    /**
     * AbstractDataTransferObject constructor.
     * @param object|array|string $data
     */
    public function __construct($data = [])
    {
        $this->helper = new DataObjectHelper();

        if (is_string($data)) {
            $decodedJson = json_decode($data, true);
            if (json_last_error() == JSON_ERROR_NONE && $this->helper->isAssocArray($decodedJson)) {
                $data = $this->helper->unCamelCaseArrayKeys($decodedJson);
            }
        }

        parent::__construct((array)$data);
    }

    /**
     * Return Data Object data in JSON format.
     *
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     *
     * @return string
     */
    public function __toJson()
    {
        $data = $this->helper->camelCaseArrayKeys($this->__toArray());
        $data = $this->helper->reIndex($data);

        return json_encode($data, JSON_PRETTY_PRINT);
    }
}
