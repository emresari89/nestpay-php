<h3 align="center"> Nestpay (EST)</h3>

<p align="center">Nestpay (A Bank, Ak Bank, Anadolu Bank, Finans Bank, Halk Bank, ING Bank, İş Bank, Şeker Bank, Türk Ekonomi Bank (TEB), Ziraat Bank) gateway for Emsa payment processing library</p>
<p align="center">
  <a href="https://travis-ci.com/emresari89/nestpay-php"><img src="https://travis-ci.com/emresari89/nestpay-php.svg?branch=master" /></a>
</p>
<hr>

<p align="center">
<b><a href="#installation">Installation</a></b>
|
<b><a href="#supported-methods">Supported Methods</a></b>
|
<b><a href="#basic-usages">Basic Usages</a></b>
</p>
<hr>
<br>

## Installation

    $ composer require emresari89/nestpay-php

## Supported methods
* purchase
* authorize
* complete
* refund
* cancel

## Basic Usages

```php
use Emsa\Common\CreditCard;
use Emsa\Nestpay\Token;
use Emsa\Nestpay\Currency;
use Emsa\Nestpay\Model\Purchase;
use Emsa\Akbank;

$token = new Token('CLIENT_ID', 'USERNAME', 'PASS');
$creditCard = new CreditCard('4355084355084358', '26', '12', '000');
$purchase = new Purchase();
$purchase->setAmount(1);
$purchase->setInstallment(1);
$purchase->setCurrency(Currency::TRY);
$purchase->setCreditCard($creditCard);
$purchase->setTestMode(true);
$response = (AkBank($token))->purchase($purchase);
if($response->isSuccessful()){
    // success!
}
```

## Change log

Please see [UPGRADE](UPGRADE.md) for more information on how to upgrade to the latest version.

## Support

If you are having general issues with Emsa, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/emresari89/nestpay-php/issues),
or better yet, fork the library and submit a pull request.


## Security

If you discover any security related issues, please email emresarioglu89@gmail.com instead of using the issue tracker.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
