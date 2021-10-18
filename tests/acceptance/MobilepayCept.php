<?php

use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverSelect;

$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/mobilepay.php');
$I->seeInTitle('Swedbank Pay MobilePay');
$I->seeInCurrentUrl('/mobilepay');
$I->switchToIFrame('//*[@id="pxhv-instrument"]/iframe');

// Submit the form
$I->click('#px-submit');

$I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $webdriver->wait()->until(
        WebDriverExpectedCondition::urlContains('https://fakeservices.externalintegration.payex.com')
    );
});

// Fill the form
$I->seeElement('#CcPan');
$I->fillField(['id' => 'CcPan'], '4925000000000004');
$I->seeElement('#CcExpiry');
$I->fillField(['id' => 'CcExpiry'], '11/25');
$I->seeElement('#TestCardsType');
$I->selectOption('#TestCardsType', ['text' => 'Visa']);

// Submit the form
$I->click('//input[@value=Pay]');

// Wait for the redirection
$I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $webdriver->wait()->until(
        WebDriverExpectedCondition::urlContains('http://localhost')
    );
});

$I->seeInCurrentUrl('complete.php');

