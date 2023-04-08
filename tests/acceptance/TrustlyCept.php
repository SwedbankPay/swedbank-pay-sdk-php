<?php

use Facebook\WebDriver\WebDriverExpectedCondition;

$scenario->skip('Temporary problem with Trustly test page');
$scenario->incomplete('Temporary problem with Trustly test page');

$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/trustly.php');
$I->seeInTitle('Swedbank Pay Trustly');
$I->seeInCurrentUrl('/trustly');
$I->switchToIFrame('//*[@id="pxhv-instrument"]/iframe');

// Submit the form
$I->wait(3);
$I->click('#px-submit');

// Wait until the target page is loaded
$I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $webdriver->wait()->until(
        WebDriverExpectedCondition::urlContains('https://test.trustly.com')
    );
});

// Wait for page load
$I->waitForElementVisible('#core_order_holder');

// Select Swedbank payment method
$I->click("//img[@alt='Swedbank ']");

// Wait for page load
$I->waitForElementNotVisible('#core_loader_text');

// Click the next link
$I->click('.button');

// Wait for page load
$I->waitForElementNotVisible('#core_loader_text');

// Fill the loginid and click the next link
$I->fillField(['name' => 'loginid'], '1111111111');

// Click the Continue link
$I->click('Continue');

// Wait for page load
$I->waitForElementNotVisible('#core_loader_text');

// Fill the otp
$otp = $I->grabTextFrom('.message_value');
$I->fillField(['name' => 'challenge_response'], $otp);

// Click the Continue link
$I->click('Continue');

// Wait for page load
$I->waitForElementNotVisible('#core_loader_text');

// Check the bank account
// Click the Continue link
$I->click('Continue');

// Wait for page load
$I->waitForElementNotVisible('#core_loader_text');

// Auth for the bank account
$otp = $I->grabTextFrom('.message_value');
$I->fillField(['name' => 'challenge_response'], $otp);

// Click the Confirm payment link
$I->click('Confirm payment');

// Wait for page load
$I->waitForElementNotVisible('#core_loader_text');

// Wait for the redirection
$I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $webdriver->wait()->until(
        WebDriverExpectedCondition::urlContains('http://localhost')
    );
});

$I->seeInCurrentUrl('complete.php');
