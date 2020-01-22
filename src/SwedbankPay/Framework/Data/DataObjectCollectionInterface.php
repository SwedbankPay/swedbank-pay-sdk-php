<?php

namespace SwedbankPay\Framework\Data;

interface DataObjectCollectionInterface
{
    /**
     * @param DataObjectCollectionItemInterface|array $item
     * @return $this
     */
    public function addItem($item);

    /**
     * @return array
     */
    public function getItems();

    /**
     * @return $this
     */
    public function unsetItems();

    /**
     * @param array $items
     * @return $this
     */
    public function resetItems($items = []);

    /**
     * @param $columnKey
     * @param $columnValue
     * @return bool|mixed
     */
    public function getItemsByColumnFilter($columnKey, $columnValue = '');

    /**
     * Return Data Object Collection Items data in array format.
     *
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     * @return array
     */
    public function __toArray();
}
