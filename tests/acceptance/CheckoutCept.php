<?php

use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverSelect;

$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/checkout.php');
$I->seeInTitle('Swedbank Pay PaymentMenu');
$I->seeInCurrentUrl('/paymentmenu');
$I->wait(15);
$I->switchToIFrame('//*[@id="pxhv-paymentmenu"]/iframe');

// Click "Credit Card"
$I->click('#creditcard-container > .menu-card-header');
$I->wait(3);

$I->switchToIFrame('//*[@id="view-creditcard"]/iframe');
$I->seeElement('#panInput');
$I->fillField(['id' => 'panInput'], '4925000000000004');
$I->seeElement('#expiryInput');
$I->fillField(['id' => 'expiryInput'], '11/25');
$I->seeElement('#cvcInput-1');
$I->fillField(['id' => 'cvcInput-1'], '123');

// Submit the form
$I->wait(5);
$I->click('#px-submit');

// Wait for the redirection
$I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $webdriver->wait()->until(
        WebDriverExpectedCondition::urlContains('http://localhost')
    );
});

$I->seeInCurrentUrl('complete.php');
