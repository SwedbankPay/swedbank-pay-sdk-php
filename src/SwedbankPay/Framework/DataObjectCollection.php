<?php

namespace SwedbankPay\Framework;

use SwedbankPay\Framework\Data\DataObjectCollectionInterface;

/**
 * Class DataObjectCollection
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class DataObjectCollection implements DataObjectCollectionInterface
{
    const ITEM_FQCN = 'SwedbankPay\\Framework\\DataObjectCollectionItem';

    /**
     * PaymentorderItem[]
     *
     * @var array
     * @access private
     */
    protected $items = [];

    /**
     * OperationsItem Fully Qualified Class Name
     *
     * @var string
     * @access private
     */
    protected $itemFqcn;

    /**
     * AbstractSimpleDataObject constructor.
     * @param array $items
     * @param string $itemFqcn
     */
    public function __construct($items = [], $itemFqcn = self::ITEM_FQCN)
    {
        $this->itemFqcn = $itemFqcn;

        foreach ((array)$items as $item) {
            $this->addItem($item);
        }
    }

    /**
     * @param DataObjectCollectionItem|array $item
     * @return $this
     */
    public function addItem($item)
    {
        if (!($item instanceof $this->itemFqcn)) {
            $item = new $this->itemFqcn($item);
        }

        $this->items[] = $item;

        return $this;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return $this
     */
    public function unsetItems()
    {
        $this->items = [];

        return $this;
    }

    /**
     * @param array $items
     * @return $this
     */
    public function resetItems($items = [])
    {
        $this->unsetItems();

        foreach ((array)$items as $item) {
            $this->addItem($item);
        }

        return $this;
    }

    /**
     * @param $columnKey
     * @param $columnValue
     * @return bool|mixed
     */
    public function getItemsByColumnFilter($columnKey, $columnValue = '')
    {
        $matchedItems = array_filter(
            $this->items,
            function (DataObjectCollectionItem $item) use ($columnKey, $columnValue) {
                if ($columnValue != '') {
                    return ($item->offsetExists($columnKey) && $item->offsetGet($columnKey) === $columnValue);
                }
                return $item->offsetExists($columnKey);
            }
        );

        if (count($matchedItems) > 0) {
            return $matchedItems;
        }

        return false;
    }

    /**
     * Return Data Object Collection Items data in array format.
     *
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     * @return array
     */
    public function __toArray()
    {
        $arr = [];

        foreach ($this->getItems() as $item) {
            $arr[] = $item->__toArray();
        }

        return $arr;
    }
}
