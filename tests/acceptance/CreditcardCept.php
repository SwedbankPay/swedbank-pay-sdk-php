<?php

use Facebook\WebDriver\WebDriverExpectedCondition;

$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/creditcard.php');
$I->seeInTitle('Swedbank Pay CreditCard');
$I->seeInCurrentUrl('/creditcardv3');
$I->switchToIFrame('//*[@id="pxhv-instrument"]/iframe');
$I->seeElement('#panInput');
$I->fillField(['id' => 'panInput'], '4925000000000004');
$I->seeElement('#expiryInput');
$I->fillField(['id' => 'expiryInput'], '11,25');
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

