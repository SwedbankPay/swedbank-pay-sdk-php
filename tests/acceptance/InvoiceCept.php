<?php

use Facebook\WebDriver\WebDriverExpectedCondition;

$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/invoice.php');
$I->seeInTitle('Swedbank Pay Invoice');
$I->seeInCurrentUrl('/invoice');
$I->switchToIFrame('//*[@id="pxhv-instrument"]/iframe');

// Fill the form
$I->seeElement('#ssnInput');
$I->clearField('#ssnInput');
$I->fillField(['id' => 'ssnInput'], '971020-2392');

$I->seeElement('#emailInput');
$I->clearField('#emailInput');
$I->fillField(['id' => 'emailInput'], 'leia.ahlstrom@payex.com');

$I->seeElement('#msisdnInput');
$I->clearField('#msisdnInput');
$I->fillField(['id' => 'msisdnInput'], '+46739000001');

$I->seeElement('#zipCodeInput');
$I->clearField('#zipCodeInput');
$I->fillField(['id' => 'zipCodeInput'], '17674');

// Submit the form
$I->click('#px-submit');

// Confirm the payment
$I->wait(5);
$I->click('#px-submit');

// Wait for the redirection
$I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $webdriver->wait()->until(
        WebDriverExpectedCondition::urlContains('http://localhost')
    );
});

$I->seeInCurrentUrl('complete.php');
