<?php
// phpcs:ignoreFile -- this is test

// phpcs:disable
require_once __DIR__ . '/abstract.php';
require_once __DIR__ . '/../bootstrap.php';
// phpcs:enable

/**
 * @codeCoverageIgnore
 */
class CompleteStand extends Stand
{
    /**
     * @throws Exception
     * @SuppressWarnings(PHPMD.Superglobals)
     * @SuppressWarnings(PHPMD.ExitExpression)
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function __construct()
    {
        // phpcs:disable
        if (php_sapi_name() !== 'cli-server') {
            exit();
        }

        session_start();
        // phpcs:enable

        // phpcs:disable
        if (isset($_SESSION['payment_order_id'])) {
            $this->processPaymentOrder($_SESSION['payment_order_id']);

            return;
        }

        if (!isset($_SESSION['payment_id'])) {
            return;
        }

        if (isset($_GET['mobilepay'])) {
            return;
        }

        $payment_id = $_SESSION['payment_id'];
        // phpcs:enable
        $info = $this->request('GET', $payment_id);

        $this->configSet(
            __DIR__ . '/../payments.ini',
            $info['payment']['instrument'],
            'payment_id',
            $info['payment']['id']
        );

        $this->showInformation($info);

        // The aborted-payment operation means that the merchant has aborted the payment before
        // the payer has fulfilled the payment process.
        // You can see this under abortReason in the response.
        $aborted = $this->getOperationByRel($info, 'aborted-payment', false);
        if (!empty($aborted)) {
            $result = $this->request($aborted['method'], $aborted['href']);

            // Abort reason
            $this->showMessage($result['aborted']['abortReason']);

            return;
        }

        // The failed-payment operation means that something went wrong during the payment process, the transaction
        // was not authorized, and no further transactions can be created if the payment is in this state.
        $failed = $this->getOperationByRel($info, 'failed-payment', false);
        if (!empty($failed)) {
            $result = $this->request($failed['method'], $failed['href']);

            // Extract the problem details
            $message = $result['title'];
            if (count($result['problem']['problems']) > 0) {
                $problems = array_column($result['problem']['problems'], 'description');
                $message = implode(', ', $problems);
            }

            $this->showMessage($message);

            return;
        }

        // The paid-payment operation confirms that the transaction has been successful
        // and that the payment is completed.
        $paid = $this->getOperationByRel($info, 'paid-payment', false);
        if (!empty($paid)) {
            $result = $this->request($paid['method'], $paid['href']);
            if (!isset($result['paid'])) {
                $message = 'Unable to verify the payment';
                $this->showMessage($message);

                return;
            }

            // Get transaction and update order statuses
            $this->showMessage('Order has been paid');
        }
    }

    /**
     * @param $paymentOrderId
     * @throws Exception
     */
    public function processPaymentOrder($paymentOrderId)
    {
        $info = $this->request('GET', $paymentOrderId);

        $this->configSet(
            __DIR__ . '/../payments.ini',
            'Checkout',
            'payment_order_id',
            $paymentOrderId
        );

        $this->showInformation($info);

        // The aborted-payment operation means that the merchant has aborted the payment before
        // the payer has fulfilled the payment process.
        // You can see this under abortReason in the response.
        $aborted = $this->getOperationByRel($info, 'aborted-payment', false);
        if (!empty($aborted)) {
            $result = $this->request($aborted['method'], $aborted['href']);

            // Abort reason
            $this->showMessage($result['aborted']['abortReason']);

            return;
        }

        // The failed-paymentorder operation means that something went wrong during the payment process, the transaction
        // was not authorized, and no further transactions can be created if the payment is in this state.
        $failed = $this->getOperationByRel($info, 'failed-paymentorder', false);
        if (!empty($failed)) {
            $result = $this->request($failed['method'], $failed['href']);

            // Extract the problem details
            $message = $result['title'];
            if (count($result['problem']['problems']) > 0) {
                $problems = array_column($result['problem']['problems'], 'description');
                $message = implode(', ', $problems);
            }

            $this->showMessage($message);

            return;
        }

        // The paid-paymentorder operation confirms that the transaction has been successful
        // and that the payment is completed.
        $paid = $this->getOperationByRel($info, 'paid-paymentorder', false);
        if (!empty($paid)) {
            $result = $this->request($paid['method'], $paid['href']);
            if (!isset($result['paid'])) {
                $this->showMessage('Unable to verify the payment');

                return;
            }

            // Get transaction and update order statuses
            $this->showMessage('Order has been paid');
        }
    }

    /**
     * Show message.
     *
     * @param string $message
     */
    public function showMessage($message)
    {
        echo '<h1>' . $message . '</h1>';
    }

    /**
     * Get Information.
     *
     * @param array $data
     */
    public function showInformation($data)
    {
        if (isset($data['payment'])) {
            $data = $data['payment'];
        } elseif (isset($data['payment_order'])) {
            $data = $data['payment_order'];
        }

        foreach ($data as $key => $value) {
            if (is_scalar($value)) {
                echo '<strong>' . $key . ': </strong>' . $value . '<br/>';
            }
        }
    }
}

new CompleteStand();
