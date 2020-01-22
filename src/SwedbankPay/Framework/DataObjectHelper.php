<?php

namespace SwedbankPay\Framework;

class DataObjectHelper
{
    /**
     * @param array $assocArray
     * @return array
     */
    public function camelCaseArrayKeys($assocArray = [])
    {
        if (!$this->isAssocArray($assocArray)) {
            foreach ($assocArray as $key => $value) {
                if (is_array($value)) {
                    $assocArray[$key] = $this->camelCaseArrayKeys($value);
                }
            }
            return $assocArray;
        }

        $arr = [];
        foreach ($assocArray as $key => $value) {
            $key = preg_replace_callback(
                '/_([^_])/',
                function (array $m) {
                    return ucfirst($m[1]);
                },
                $key
            );

            if (is_array($value)) {
                $value = $this->camelCaseArrayKeys($value);
            }

            $arr[$key] = $value;
        }

        return $arr;
    }

    /**
     * @param array $assocArray
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return array
     */
    public function unCamelCaseArrayKeys($assocArray = [])
    {
        if (!$this->isAssocArray($assocArray)) {
            foreach ($assocArray as $key => $value) {
                if (is_array($value)) {
                    $assocArray[$key] = $this->unCamelCaseArrayKeys($value);
                }
            }
            return $assocArray;
        }

        $arr = [];
        foreach ($assocArray as $key => $value) {
            if (is_string($key) && $key != '') {
                $matches = [];
                preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][Data-z0-9])|[A-Za-z][Data-z0-9]+)!', $key, $matches);
                $ret = $matches[0];
                foreach ($ret as &$match) {
                    $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
                }
                $key = implode('_', $ret);
            }
            if (is_array($value)) {
                $arr[$key] = $this->unCamelCaseArrayKeys($value);
                continue;
            }
            $arr[$key] = $value;
        }

        return $arr;
    }

    /**
     * @param array $array
     * @return bool
     */
    public function isAssocArray($array = [])
    {
        if (!is_array($array) || array() === $array) {
            return false;
        }
        return array_keys($array) !== range(0, count($array) - 1);
    }

    /**
     * @param array $array
     * @return array
     *
     * @SuppressWarnings("ElseExpression")
     *
     */
    public function reIndex($array = [])
    {
        $index = 0;
        $return = [];

        foreach ($array as $key => $value) {
            if (is_string($key)) {
                $newKey = $key;
            } else {
                $newKey = $index;
                ++$index;
            }

            $return[$newKey] = is_array($value) ? $this->reIndex($value) : $value;
        }

        // Sort alphabetically, numeric first then alpha
        ksort($return, SORT_NATURAL);

        return $return;
    }
}
