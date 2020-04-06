<?php
// phpcs:ignoreFile

namespace SwedbankPay\Api;

use SwedbankPay\Api\Client\Exception;

/**
 * Response class to handle JSON objects
 *
 * @note For backwards compatibility for previous versions
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class Response implements \ArrayAccess
{
    /**
     * JSON Body
     *
     * @var string
     */
    protected $body = '';

    /**
     * Parsed JSON Body
     *
     * @var array|mixed
     */
    protected $object = [];

    /**
     * Response constructor.
     *
     * @param $body
     *
     * @throws Exception
     */
    public function __construct($body)
    {
        $this->body   = $body;
        $this->object = json_decode($body, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Unable to decode JSON.');
        }
    }

    /**
     * Get Source Body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * To Array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->object;
    }

    /**
     * To JSON
     *
     * @param int $options
     *
     * @return false|string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->object, $options);
    }

    /**
     * To String
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * Set Value
     *
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->object[$key] = $value;
    }

    /**
     * Get Value
     *
     * @param $key
     *
     * @return mixed|null
     */
    public function __get($key)
    {
        return isset($this->object[$key]) ? $this->object[$key] : null;
    }

    /**
     * Is Set Value
     *
     * @param $key
     *
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->object[$key]);
    }

    /**
     * Unset
     *
     * @param $key
     */
    public function __unset($key)
    {
        unset($this->object[$key]);
    }

    /**
     * Implementation of \ArrayAccess::offsetSet()
     *
     * @param string $offset
     * @param mixed $value
     * @return void
     * @link http://www.php.net/manual/en/arrayaccess.offsetset.php
     * @SuppressWarnings(PHPMD.ElseExpression)
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->object[] = $value;
        } else {
            $this->object[$offset] = $value;
        }
    }

    /**
     * Implementation of \ArrayAccess::offsetExists()
     *
     * @param string $offset
     * @return bool
     * @link http://www.php.net/manual/en/arrayaccess.offsetexists.php
     */
    public function offsetExists($offset)
    {
        return isset($this->object[$offset]);
    }

    /**
     * Implementation of \ArrayAccess::offsetUnset()
     *
     * @param string $offset
     * @return void
     * @link http://www.php.net/manual/en/arrayaccess.offsetunset.php
     */
    public function offsetUnset($offset)
    {
        unset($this->object[$offset]);
    }

    /**
     * Implementation of \ArrayAccess::offsetGet()
     *
     * @param string $offset
     * @return mixed
     * @link http://www.php.net/manual/en/arrayaccess.offsetget.php
     */
    public function offsetGet($offset)
    {
        return isset($this->object[$offset]) ? $this->object[$offset] : null;
    }

    /**
     * Set/Get attribute wrapper
     *
     * @param $method
     * @param $arguments
     *
     * @return mixed
     * @throws Exception
     */
    public function __call($method, $arguments)
    {
        $key = lcfirst(mb_substr($method, 3, mb_strlen($method, 'UTF-8'), 'UTF-8'));
        switch (mb_substr($method, 0, 3, 'UTF-8')) {
            case 'get':
                return $this->__get($key);
            case 'set':
                return $this->__set($key, $arguments[0]);
            case 'uns':
                return $this->__unset($key);
            case 'has':
                return $this->__isset($key);
        }

        throw new Exception(sprintf('Invalid method %s::%s', get_class($this), $method));
    }

    /**
     * Extract operation value from operations list
     *
     * @param string $rel
     * @param bool   $single
     *
     * @return bool|string|array
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function getOperationByRel($rel, $single = true)
    {
        $operations = isset($this->object['operations']) ? $this->object['operations'] : [];
        $operation  = array_filter($operations, function ($value, $key) use ($rel) {
            return (is_array($value) && $value['rel'] === $rel);
        }, ARRAY_FILTER_USE_BOTH);

        if (count($operation) > 0) {
            $operation = array_shift($operation);

            return $single ? $operation['href'] : $operation;
        }

        return false;
    }
}
