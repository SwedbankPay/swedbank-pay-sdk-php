<?php

namespace SwedbankPay\Api\Service\Trustly\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PrefillInfoInterface;

/**
 * Trustly payment prefill info interface
 *
 * @api
 */
interface PaymentPrefillInfoInterface extends PrefillInfoInterface
{
    /**
     * Prefilled value to put in the first name text box.
     */
    const FIRST_NAME = 'firstName';

    /**
     * Prefilled value to put in the last name text box.
     */
    const LAST_NAME = 'lastName';
}
