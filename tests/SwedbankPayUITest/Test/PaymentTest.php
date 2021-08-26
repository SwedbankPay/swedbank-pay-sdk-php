<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayUITest\Test;

use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverSelect;
use Lmc\Steward\Test\AbstractTestCase;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.TooManyMethods)
 */
class PaymentTest extends AbstractTestCase
{
    /**
     * Test Credit Card.
     *
     * @throws \Facebook\WebDriver\Exception\NoSuchElementException
     * @throws \Facebook\WebDriver\Exception\TimeoutException
     */
    public function testCreditCard()
    {
        if (!$this->wd) {
            $this->markTestSkipped('Impossible to use this test');
        }

        $this->wd->get('http://localhost:8000/creditcard.php');

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('Swedbank Pay CreditCard', $this->wd->getTitle());
        $this->assertContains(
            'https://ecom.externalintegration.payex.com/creditcardv2',
            $this->wd->getCurrentURL()
        );

        $this->wd->switchTo()->frame(0);

        // Fill the form
        $panInput = $this->wd->findElement(WebDriverBy::id('panInput'));
        $this->assertEquals('ccnum', $panInput->getAttribute('name'));

        $panInput->click()
            ->sendKeys('4925000000000004');

        $expiryInput = $this->wd->findElement(WebDriverBy::id('expiryInput'));
        $this->assertEquals('ccexp', $expiryInput->getAttribute('name'));

        $expiryInput->click()
            ->sendKeys('11,25');

        $expiryInput = $this->wd->findElement(WebDriverBy::id('cvcInput'));
        $this->assertEquals('cccvc', $expiryInput->getAttribute('name'));

        $expiryInput->click()
            ->sendKeys('123');

        // Submit the form
        $pxSubmit = $this->wd->findElement(WebDriverBy::id('px-submit'));
        $pxSubmit->click();
        $pxSubmit->submit();

        // Wait until the target page is loaded
        $this->wd->wait()->until(
            WebDriverExpectedCondition::urlContains('http://localhost')
        );

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('complete.php', $this->wd->getCurrentURL());
        $this->wd->quit();
    }

    /**
     * Test Vipps.
     *
     * @throws \Facebook\WebDriver\Exception\NoSuchElementException
     * @throws \Facebook\WebDriver\Exception\TimeoutException
     */
    public function testVipps()
    {
        if (!$this->wd) {
            $this->markTestSkipped('Impossible to use this test');
        }

        $this->wd->get('http://localhost:8000/vipps.php');

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('Swedbank Pay Vipps', $this->wd->getTitle());
        $this->assertContains(
            'https://ecom.externalintegration.payex.com/vipps',
            $this->wd->getCurrentURL()
        );

        $this->wd->switchTo()->frame(0);

        // Submit the form
        $pxSubmit = $this->wd->findElement(WebDriverBy::id('px-submit'));
        $pxSubmit->click();

        // Wait until the target page is loaded
        $this->wd->wait()->until(
            WebDriverExpectedCondition::urlContains('https://fakeservices.externalintegration.payex.com')
        );
        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());

        // Submit
        $pxSubmit = $this->wd->findElement(WebDriverBy::id('okButton'));
        $pxSubmit->click();

        // Wait until the target page is loaded
        $this->wd->wait()->until(
            WebDriverExpectedCondition::urlContains('http://localhost')
        );

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('complete.php', $this->wd->getCurrentURL());
        $this->wd->quit();
    }

    /**
     * Test Mobile Pay.
     *
     * @throws \Facebook\WebDriver\Exception\NoSuchElementException
     * @throws \Facebook\WebDriver\Exception\TimeoutException
     */
    public function testMobilePay()
    {
        if (!$this->wd) {
            $this->markTestSkipped('Impossible to use this test');
        }

        $this->wd->get('http://localhost:8000/mobilepay.php');

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('Swedbank Pay MobilePay', $this->wd->getTitle());
        $this->assertContains(
            'https://ecom.externalintegration.payex.com/mobilepay',
            $this->wd->getCurrentURL()
        );

        $this->wd->switchTo()->frame(0);

        // Submit the payment form
        $pxSubmit = $this->wd->findElement(WebDriverBy::id('px-submit'));
        $pxSubmit->click();

        // Wait until the target page is loaded
        $this->wd->wait()->until(
            WebDriverExpectedCondition::urlContains('https://fakeservices.externalintegration.payex.com')
        );
        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());

        // Fill the form and submit it
        $ccPan = $this->wd->findElement(WebDriverBy::id('CcPan'));
        $ccPan->click()
            ->sendKeys('4925000000000004');

        $expiry = $this->wd->findElement(WebDriverBy::id('CcExpiry'));
        $expiry->click()
            ->sendKeys('11/25');

        $cardType = $this->wd->findElement(WebDriverBy::id('TestCardsType'));

        $select = new WebDriverSelect($cardType);
        $select->selectByVisibleText('Visa');

        // Submit
        $cardType->submit();

        // Wait until the target page is loaded
        $this->wd->wait()->until(
            WebDriverExpectedCondition::urlContains('http://localhost')
        );

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('complete.php', $this->wd->getCurrentURL());
        $this->wd->quit();
    }

    /**
     * Test Checkout.
     *
     * @throws \Facebook\WebDriver\Exception\NoSuchElementException
     * @throws \Facebook\WebDriver\Exception\TimeoutException
     */
    public function testCheckout()
    {
        if (!$this->wd) {
            $this->markTestSkipped('Impossible to use this test');
        }

        $this->wd->get('http://localhost:8000/checkout.php');

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('Swedbank Pay PaymentMenu', $this->wd->getTitle());
        $this->assertContains(
            'https://ecom.externalintegration.payex.com/paymentmenu',
            $this->wd->getCurrentURL()
        );

        $this->wd->switchTo()->frame(1);

        $menuItem = $this->wd->findElement(
            WebDriverBy::cssSelector('#creditcard-container > .menu-card-header')
        );

        $menuItem->click();
        self::sleep(3);

        // Fill the form and submit it
        $this->wd->switchTo()->frame(0);

        $ccPan = $this->wd->findElement(WebDriverBy::id('panInput'));
        $ccPan->click()
            ->sendKeys('4925000000000004');

        $expiry = $this->wd->findElement(WebDriverBy::id('expiryInput'));
        $expiry->click()
            ->sendKeys('11/25');

        $expiry = $this->wd->findElement(WebDriverBy::id('cvcInput'));
        $expiry->click()
            ->sendKeys('123');

        // Submit the payment form
        //$pxSubmit = $this->wd->findElement(WebDriverBy::id('px-submit'));
        //$pxSubmit->click();
        $expiry->submit();

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());

        // Wait until the target page is loaded
        $this->wd->wait()->until(
            WebDriverExpectedCondition::urlContains('http://localhost')
        );

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('complete.php', $this->wd->getCurrentURL());
        $this->wd->quit();
    }

    /**
     * Test Trustly.
     *
     * @throws \Facebook\WebDriver\Exception\NoSuchElementException
     * @throws \Facebook\WebDriver\Exception\TimeoutException
     * @SuppressWarnings(PHPMD.LongMethod)
     */
    public function testTrustly()
    {
        if (!$this->wd) {
            $this->markTestSkipped('Impossible to use this test');
        }

        $this->wd->get('http://localhost:8000/trustly.php');

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('Swedbank Pay Trustly', $this->wd->getTitle());
        $this->assertContains(
            'https://ecom.externalintegration.payex.com/trustly',
            $this->wd->getCurrentURL()
        );

        $this->wd->switchTo()->frame(0);

        // Submit the payment form
        $pxSubmit = $this->wd->findElement(WebDriverBy::id('px-submit'));
        $pxSubmit->click();

        // Wait until the target page is loaded
        $this->wd->wait()->until(
            WebDriverExpectedCondition::urlContains('https://test.trustly.com')
        );
        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());

        $this->assertContains(
            'https://test.trustly.com/_/orderclient.php',
            $this->wd->getCurrentURL()
        );

        // Wait for page load
        $this->wd->wait()->until(
            WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('core_order_holder'))
        );

        $menuItem = $this->wd->findElement(
            WebDriverBy::xpath("//img[@alt='Swedbank']")
        );
        $menuItem->click();

        // Wait for the loader is being hidden
        $this->wd->wait()->until(
            WebDriverExpectedCondition::not(
                WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('core_loader_text'))
            )
        );

        // Click the next link
        $menuItem = $this->wd->findElement(
            WebDriverBy::className('button')
        );
        $menuItem->click();

        // Wait for the loader is being hidden
        $this->wd->wait()->until(
            WebDriverExpectedCondition::not(
                WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('core_loader_text'))
            )
        );

        // Fill the loginid and click the next link
        $ccPan = $this->wd->findElement(WebDriverBy::name('loginid'));
        $ccPan->click()
            ->sendKeys('1111111111');

        $menuItem = $this->wd->findElement(
            WebDriverBy::linkText('Continue')
        );
        $menuItem->click();

        // Wait for the loader is being hidden
        $this->wd->wait()->until(
            WebDriverExpectedCondition::not(
                WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('core_loader_text'))
            )
        );

        // Fill the otp
        $otp = $this->wd->findElement(WebDriverBy::cssSelector('.message_value'));
        $code = $otp->getText();

        $pass = $this->wd->findElement(WebDriverBy::name('challenge_response'));
        $pass->click()
            ->sendKeys($code);

        $menuItem = $this->wd->findElement(
            WebDriverBy::linkText('Continue')
        );
        $menuItem->click();

        // Wait for the loader is being hidden
        $this->wd->wait()->until(
            WebDriverExpectedCondition::not(
                WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('core_loader_text'))
            )
        );

        // Check the bank account
        $menuItem = $this->wd->findElement(
            WebDriverBy::linkText('Continue')
        );
        $menuItem->click();

        // Wait for the loader is being hidden
        $this->wd->wait()->until(
            WebDriverExpectedCondition::not(
                WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('core_loader_text'))
            )
        );

        // Auth for the bank account
        $otp = $this->wd->findElement(WebDriverBy::cssSelector('.message_value'));
        $code = $otp->getText();

        $pass = $this->wd->findElement(WebDriverBy::name('challenge_response'));
        $pass->click()
            ->sendKeys($code);

        $menuItem = $this->wd->findElement(
            WebDriverBy::linkText('Confirm payment')
        );
        $menuItem->click();

        // Wait for the loader is being hidden
        $this->wd->wait()->until(
            WebDriverExpectedCondition::not(
                WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('core_loader_text'))
            )
        );

        // Wait until the target page is loaded
        $this->wd->wait()->until(
            WebDriverExpectedCondition::urlContains('http://localhost')
        );

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('complete.php', $this->wd->getCurrentURL());
        $this->wd->quit();
    }

    /**
     * Test Swish.
     *
     * @throws \Facebook\WebDriver\Exception\NoSuchElementException
     * @throws \Facebook\WebDriver\Exception\TimeoutException
     */
    public function testSwish()
    {
        if (!$this->wd) {
            $this->markTestSkipped('Impossible to use this test');
        }

        $this->wd->get('http://localhost:8000/swish.php');

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('Swedbank Pay Swish', $this->wd->getTitle());
        $this->assertContains(
            'https://ecom.externalintegration.payex.com/swish',
            $this->wd->getCurrentURL()
        );

        $this->wd->switchTo()->frame(0);

        // Submit
        $pxSubmit = $this->wd->findElement(WebDriverBy::id('px-submit'));
        $pxSubmit->click();

        // Wait until the target page is loaded
        $this->wd->wait()->until(
            WebDriverExpectedCondition::urlContains('http://localhost')
        );

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('complete.php', $this->wd->getCurrentURL());
        $this->wd->quit();
    }

    /**
     * Test Invoice.
     *
     * @throws \Facebook\WebDriver\Exception\NoSuchElementException
     * @throws \Facebook\WebDriver\Exception\TimeoutException
     */
    public function testInvoice()
    {
        if (!$this->wd) {
            $this->markTestSkipped('Impossible to use this test');
        }

        $this->wd->get('http://localhost:8000/invoice.php');

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('Swedbank Pay Invoice', $this->wd->getTitle());
        $this->assertContains(
            'https://ecom.externalintegration.payex.com/invoice',
            $this->wd->getCurrentURL()
        );

        $this->wd->switchTo()->frame(0);

        // Fill the form and submit it
        $ssnInput = $this->wd->findElement(WebDriverBy::id('ssnInput'));
        $ssnInput->click()
            ->sendKeys('971020-2392');

        $emailInput = $this->wd->findElement(WebDriverBy::id('emailInput'));
        $emailInput->click()
            ->sendKeys('leia.ahlstrom@payex.com');

        $msisdnInput = $this->wd->findElement(WebDriverBy::id('msisdnInput'));
        $msisdnInput->click()
            ->sendKeys('+46739000001');

        $zipCodeInput = $this->wd->findElement(WebDriverBy::id('zipCodeInput'));
        $zipCodeInput->click()
            ->sendKeys('17674');

        // Submit the payment form
        $pxSubmit = $this->wd->findElement(WebDriverBy::id('px-submit'));
        $pxSubmit->click();

        self::sleep(10);

        // Submit the payment form
        $pxSubmit = $this->wd->findElement(WebDriverBy::id('px-submit'));
        $pxSubmit->click();

        // Wait until the target page is loaded
        $this->wd->wait()->until(
            WebDriverExpectedCondition::urlContains('http://localhost')
        );

        $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());
        $this->assertContains('complete.php', $this->wd->getCurrentURL());
        $this->wd->quit();
    }
}