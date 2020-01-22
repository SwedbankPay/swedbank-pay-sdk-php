<?php

namespace SwedbankPay\Framework\Data;

interface SimpleDataObjectInterface
{
    /**
     * Assigns Data value to the specified offset
     *
     * @param string The offset to assign the value to
     * @param mixed  The value to set
     * @access public
     * @abstracting ArrayAccess
     * @return $this
     */
    public function offsetSet($offset, $value);

    /**
     * Whether or not an offset exists
     *
     * @param string An offset to check for
     * @access public
     * @return boolean
     * @abstracting ArrayAccess
     */
    public function offsetExists($offset);

    /**
     * Unsets an offset
     *
     * @param string The offset to unset
     * @access public
     * @abstracting ArrayAccess
     * @return $this
     */
    public function offsetUnset($offset);

    /**
     * Returns the value at specified offset
     *
     * @param string The offset to retrieve
     * @access public
     * @abstracting ArrayAccess
     * @return mixed
     */
    public function offsetGet($offset);

    /**
     * Return Data Object data in array format.
     *
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     *
     * @param SimpleDataObjectInterface|array|null $data
     * @return array
     */
    public function __toArray($data = null);
}
