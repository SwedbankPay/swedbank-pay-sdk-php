<?php

use Facebook\WebDriver\WebDriverExpectedCondition;

$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/vipps.php');
$I->seeInTitle('Swedbank Pay Vipps');
$I->seeInCurrentUrl('/vipps');
$I->switchToIFrame('//*[@id="pxhv-instrument"]/iframe');

// Submit the form
$I->click('#px-submit');

$I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $webdriver->wait()->until(
        WebDriverExpectedCondition::urlContains('https://fakeservices.externalintegration.payex.com')
    );
});

// Submit the form
$I->click('#okButton');

// Wait for the redirection
$I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $webdriver->wait()->until(
        WebDriverExpectedCondition::urlContains('http://localhost')
    );
});

$I->seeInCurrentUrl('complete.php');
