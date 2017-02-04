<?php

namespace tests;

use PHPUnit_Framework_TestCase;
use shoppingcart\cart\Cart;
use shoppingcart\common\GlobalVariables;
use shoppingcart\product\Product;
use shoppingcart\voucher\Voucher;

/**
 * Class CartTest
 * @package tests
 */
class CartTest extends PHPUnit_Framework_TestCase
{
    /** @var  Cart */
    protected $cart;

    public function setUp()
    {
        $this->cart = $this->buildCartExample();
    }

    public function tearDown()
    {
        $this->cart = null;
    }

    public function testCartIsNotEmpty()
    {
        $this->assertNotEmpty($this->cart);
    }

    public function testCartHasTheExpectedSellingPrice()
    {
        $this->assertEquals(39.9, $this->cart->getSellingPrice());
    }

    private static function buildCartExample()
    {
        $cartExample = new Cart('Cart Example 1');
        $cartExample->addProduct(new Product(GlobalVariables::PRODUCT_A, GlobalVariables::PRICE_PRODUCT_A));
        $cartExample->addProduct(new Product(GlobalVariables::PRODUCT_C, GlobalVariables::PRICE_PRODUCT_C));
        $cartExample->addVoucher(new Voucher(GlobalVariables::VOUCHER_S, GlobalVariables::VOUCHER_S_VALUE));
        $cartExample->addProduct(new Product(GlobalVariables::PRODUCT_A, GlobalVariables::PRICE_PRODUCT_A));
        $cartExample->addVoucher(new Voucher(GlobalVariables::VOUCHER_V, GlobalVariables::VOUCHER_V_VALUE));
        $cartExample->addProduct(new Product(GlobalVariables::PRODUCT_B, GlobalVariables::PRICE_PRODUCT_B));

        return $cartExample;
    }
}
