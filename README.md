# Swedbank Pay SDK for PHP

![Build status][build-badge]
[![Latest Stable Version][version-badge]][packagist]
[![Total Downloads][downloads-badge]][packagist]
[![License][license-badge]][packagist]

[![Swedbank Pay SDK for PHP][og-image]][packagist]

## About

**IMPORTANT**: This SDK is at an early stage and not yet used in production.
We do not offer support for this version, but will release supported versions
in the future. Feel free to play around, but for full functionality and support,
please wait for the supported, stable release.

The Swedbank Pay SDK for PHP simplifies integrations against
[Swedbank Pay's API Platform][api] by providing native PHP interface towards
the REST API.

This SDK includes the following payments options:

* Checkout
* Credit and debit cards (Visa, Mastercard, Visa Electron, Maestro etc).
* Invoice
* Swish
* Vipps

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

  [build-badge]:      https://github.com/SwedbankPay/swedbank-pay-sdk-php/workflows/PHP/badge.svg?branch=master
  [dev-portal]:       https://developer.swedbankpay.com/
  [releases]:         https://github.com/SwedbankPay/swedbank-pay-sdk-php/releases
  [composer]:         https://getcomposer.org
  [composer-intro]:   https://getcomposer.org/doc/00-intro.md
  [version-badge]:    https://poser.pugx.org/swedbank-pay/swedbank-pay-sdk-php/version
  [downloads-badge]:  https://poser.pugx.org/swedbank-pay/swedbank-pay-sdk-php/downloads
  [license-badge]:    https://poser.pugx.org/swedbank-pay/swedbank-pay-sdk-php/license
  [packagist]:        https://packagist.org/packages/swedbank-pay/swedbank-pay-sdk-php
  [og-image]:         https://repository-images.githubusercontent.com/211837579/156c6000-53ed-11ea-8927-782b8067996f
