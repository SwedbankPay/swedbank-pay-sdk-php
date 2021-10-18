<?php

use Facebook\WebDriver\WebDriverExpectedCondition;

$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/swish.php');
$I->seeInTitle('Swedbank Pay Swish');
$I->seeInCurrentUrl('/swish');
$I->switchToIFrame('//*[@id="pxhv-instrument"]/iframe');

// Fill the form
$I->seeElement('#msisdnInput');
$I->clearField('#msisdnInput');
$I->fillField(['id' => 'msisdnInput'], '46760000000');

// Submit the form
$I->click('#px-submit');

// Wait for the redirection
$I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $webdriver->wait()->until(
        WebDriverExpectedCondition::urlContains('http://localhost')
    );
});

$I->seeInCurrentUrl('complete.php');
