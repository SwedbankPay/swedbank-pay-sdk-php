# Swedbank Pay SDK for PHP

![Build status][build-badge]
[![Latest Stable Version][version-badge]][packagist]
[![Total Downloads][downloads-badge]][packagist]
[![Codecov][codecov-badge]][codecov]
[![License][license-badge]][packagist]

[![Swedbank Pay SDK for PHP][og-image]][packagist]

## About

**UNSUPPORTED**: This SDK is at an early stage of development and is not
supported as of yet by Swedbank Pay. It is provided as a convenience to speed
up your development, so please feel free to play around. However, if you need
support, please wait for a future, stable release.

The Swedbank Pay SDK for PHP simplifies integrations against
[Swedbank Pay's API Platform][dev-portal] by providing native PHP interface towards
the REST API.

This SDK includes the following payments options:

*   Checkout
*   Credit and debit cards (Visa, Mastercard, Visa Electron, Maestro etc).
*   Invoice
*   Swish
*   Vipps
*   MobilePay Online
*   Trustly

## Documentation

Documentation about Swedbank Pay's API Platform can be found on the
[Swedbank Pay Developer Portal][dev-portal] for now.

## Installation

The recommended way to install the Swedbank Pay SDK for PHP library is with
Composer. You can also download the source code from one of the
[releases here on GitHub][releases] or simply clone this repository.

### Composer

The preferred method is via [Composer][composer]. Follow the
[installation instructions][composer-intro] if you do not already have
composer installed.

Once composer is installed, execute the following command in your project root
to install this SDK:

```sh
composer require swedbank-pay/swedbank-pay-sdk-php
```

## Examples

You can find examples in `/tests` directory or check out [Swedbank Pay Core for WooCommerce][core-library] code.

## Using Online Payments v3.1

Version 6.3.0 introduces typed response support for Online Payments v3.1. The v3.1 surface
lives under the `SwedbankPay\Api\Service\Paymentorder\V3` namespace and is fully additive —
existing v2 classes are unchanged.

Opt in by setting the API version on the Client (this switches the `Content-Type` header
to `application/json;version=3.1`):

```php
use SwedbankPay\Api\Client\Client;
use SwedbankPay\Api\Service\Paymentorder\V3\Request\Purchase;
use SwedbankPay\Api\Service\Paymentorder\V3\Request\TransactionCapture;

$client = new Client();
$client->setAccessToken('...')->setPayeeId('...');
$client->setApiVersion('3.1');

// Create paymentOrder
$purchase = new Purchase($paymentOrderObject);
$purchase->setClient($client);
$response = $purchase->send();

$paymentOrder = $response->getResponseResource()->getPaymentOrder();
echo $paymentOrder->getStatus();      // "Initialized" / "Paid" / "Aborted" / ...
echo $paymentOrder->getId();
```

For post-purchase actions (Capture, Cancel, Reversal), call `setExpands(['financialtransactions', 'paid'])`
when you want the freshly-created transaction inlined in the response:

```php
$capture = new TransactionCapture($transactionObject);
$capture->setClient($client);
$capture->setPaymentOrderId($paymentOrderId);
$capture->setExpands(['financialtransactions', 'paid']);

$response = $capture->send();
$latest   = $response->getResponseResource()->getLatestFinancialTransaction();
echo $latest->getType();    // "Capture"
echo $latest->getNumber();
```

Typed callback parsing:

```php
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\CallbackPayload;

$payload = new CallbackPayload($webhookBody);
$orderRef = $payload->getOrderReference();
$paymentOrderId = $payload->getPaymentOrder()->getId();
```

  [build-badge]:      https://github.com/SwedbankPay/swedbank-pay-sdk-php/workflows/PHP/badge.svg?branch=master
  [dev-portal]:       https://developer.swedbankpay.com/
  [releases]:         https://github.com/SwedbankPay/swedbank-pay-sdk-php/releases
  [composer]:         https://getcomposer.org
  [composer-intro]:   https://getcomposer.org/doc/00-intro.md
  [version-badge]:    https://poser.pugx.org/swedbank-pay/swedbank-pay-sdk-php/version
  [downloads-badge]:  https://poser.pugx.org/swedbank-pay/swedbank-pay-sdk-php/downloads
  [license-badge]:    https://poser.pugx.org/swedbank-pay/swedbank-pay-sdk-php/license
  [packagist]:        https://packagist.org/packages/swedbank-pay/swedbank-pay-sdk-php
  [codecov]:          https://codecov.io/gh/SwedbankPay/swedbank-pay-sdk-php
  [codecov-badge]:    https://codecov.io/gh/SwedbankPay/swedbank-pay-sdk-php/branch/master/graph/badge.svg
  [og-image]:         https://repository-images.githubusercontent.com/211837579/156c6000-53ed-11ea-8927-782b8067996f
  [core-library]:     https://github.com/SwedbankPay/swedbank-pay-woocommerce-core