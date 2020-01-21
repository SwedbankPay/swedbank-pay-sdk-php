<?php

namespace PayEx\Api\Service\Invoice\Transaction\Resource\Request\Data;

use PayEx\Api\Service\Payment\Transaction\Resource\Request\Data\TransferInterface;

/**
 * Transaction Reversal Interface
 *
 * @api
 */
interface ReversalInterface extends TransferInterface
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
