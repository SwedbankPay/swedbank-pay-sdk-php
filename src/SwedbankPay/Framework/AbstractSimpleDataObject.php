<?php

namespace SwedbankPay\Framework;

use Exception;
use SwedbankPay\Framework\Data\DataTransferObjectInterface;
use SwedbankPay\Framework\Data\SimpleDataObjectInterface;

/**
 * Abstract class for simple data objects
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
abstract class AbstractSimpleDataObject implements SimpleDataObjectInterface, \ArrayAccess
{
    /**
     * Data
     *
     * @var array
     * @access private
     */
    protected $data = [];

    /**
     * AbstractSimpleDataObject constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = (array)$data;
    }

    /**
     * Get Data data by key
     *
     * @param string The key data to retrieve
     * @access public
     * @return mixed
     */
    public function &__get($key)
    {
        return $this->data[$key];
    }

    /**
     * Assigns Data value to the specified data
     *
     * @param string The data key to assign the value to
     * @param mixed  The value to set
     * @access public
     * @return $this
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * Whether or not an data exists by key
     *
     * @param string An data key to check for
     * @access public
     * @return boolean
     * @abstracting ArrayAccess
     */
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * Unsets an data by key
     *
     * @param string The key to unset
     * @access public
     * @return $this
     */
    public function __unset($key)
    {
        unset($this->data[$key]);
        return $this;
    }

    /**
     * Assigns Data value to the specified offset
     *
     * @param string The offset to assign the value to
     * @param mixed  The value to set
     * @access public
     * @abstracting ArrayAccess
     * @return $this
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;
            return $this;
        }

        $this->data[$offset] = $value;
        return $this;
    }

    /**
     * Whether or not an offset exists
     *
     * @param string An offset to check for
     * @access public
     * @return boolean
     * @abstracting ArrayAccess
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * Unsets an offset
     *
     * @param string The offset to unset
     * @access public
     * @abstracting ArrayAccess
     * @return $this
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->data[$offset]);
        }
        return $this;
    }

    /**
     * Returns the value at specified offset
     *
     * @param string The offset to retrieve
     * @access public
     * @abstracting ArrayAccess
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }

    /**
     * Return Data Object data in array format.
     *
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     *
     * @param DataTransferObjectInterface|array|null $data
     * @return array
     */
    public function __toArray($data = null)
    {
        if (is_null($data)) {
            $data = $this->data;
        }

        $hasToArray = function ($model) {
            return is_object($model) && method_exists($model, '__toArray') && is_callable([$model, '__toArray']);
        };

        foreach ($data as $key => $value) {
            if ($hasToArray($value)) {
                $data[$key] = call_user_func([$value, '__toArray']);
            } elseif (is_array($value)) {
                foreach ($value as $nestedKey => $nestedValue) {
                    if ($hasToArray($nestedValue)) {
                        $value[$nestedKey] = call_user_func([$nestedValue, '__toArray']);
                    }
                }
                $data[$key] = $value;
            }
        }

        return $data;
    }

    /**
     * Set/Get attribute wrapper
     *
     * @param $method
     * @param $arguments
     *
     * @throws \Exception
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        $key = lcfirst(mb_substr($method, 3, mb_strlen($method, 'UTF-8'), 'UTF-8'));
        switch (mb_substr($method, 0, 3, 'UTF-8')) {
            case 'get':
                return $this->offsetGet($key);
            case 'set':
                return $this->offsetSet($key, $arguments[0]);
            case 'uns':
                return $this->offsetUnset($key);
            case 'has':
                return $this->offsetExists($key);
        }

        throw new Exception(sprintf('Invalid method %s::%s', get_class($this), $method));
    }
}
