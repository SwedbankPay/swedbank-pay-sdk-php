<?php

namespace PayEx\Api\Service\Invoice\Transaction\Resource\Request\Data;

use PayEx\Api\Service\Resource\Data\RequestInterface;

interface TransactionInterface extends RequestInterface
{
    const ACTIVITY = 'activity';

    /**
     * @return string
     */
    public function getActivity();

    /**
     * @param string $activity
     * @return $this
     */
    public function setActivity($activity);
}
