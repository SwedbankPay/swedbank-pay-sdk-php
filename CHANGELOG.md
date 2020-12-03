# Changelog
## [4.0.0] - 2020-12-03
### Added
- Support for MobilePay
- Support for Trustly
- Support for `metadata`
- 3-D Secure 2 fields to the SDK
- `setOperationRel()` and `getOperationRel()` for `Request` class
- `getPayerReference()` and `setPayerReference()` methods for `Paymentorder` class
- `Metadata` class
- `setReceiptReference()` and `getReceiptReference()` for `CaptureInterface` of Invoice
- Cardholder & RiskIndicator resources for Card payments
- RiskIndicator field to Paymentorder resource
- Payer & RiskIndicator resources for 3D Secure 2
- OrderItems, PaymentUrl & improves functionalities

### Changed
- Got rid of the direct url building
- Fixed a bug in `prefillInfo`.
- Added back the `Response` class that was removed before
- Removed `CreateAuthorization` for Vipps

## [3.4.0] - 2019-10-08
### Added
- Adds request resources for creditcard, invoice, swish and vipps payment methods

### Changed
- Reworked payment transactions resources for supporting 1-phase payments
