<?php

namespace shoppingcart\app;

use shoppingcart\cart\Cart;
use shoppingcart\common\GlobalVariables;
use shoppingcart\product\Product;
use shoppingcart\voucher\Voucher;

/**
 * Class ShoppingCart
 *
 * @package shoppingcart\app
 * @author Eduardo Llorens <ellorensc@gmail.com>
 * @version 1.0
 */
class ShoppingCart
{
    private function __construct()
    {

    }

    public static function run()
    {
        $instance = new ShoppingCart();
        $instance->init();
    }

    public static function init()
    {
        /** @var Cart $cartExample1 */
        $cartExample1 = self::buildCartExample1();
        echo $cartExample1->getSellingPrice();

        /** @var Cart $cartExample2 */
        $cartExample2 = self::buildCartExample2();
        echo $cartExample2->getSellingPrice();
    }

    private static function buildCartExample1()
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

    private static function buildCartExample2()
    {
        $cartExample = new Cart('Cart Example 2');
        $cartExample->addProduct(new Product(GlobalVariables::PRODUCT_A, GlobalVariables::PRICE_PRODUCT_A));
        $cartExample->addVoucher(new Voucher(GlobalVariables::VOUCHER_S, GlobalVariables::VOUCHER_S_VALUE));
        $cartExample->addProduct(new Product(GlobalVariables::PRODUCT_A, GlobalVariables::PRICE_PRODUCT_A));
        $cartExample->addVoucher(new Voucher(GlobalVariables::VOUCHER_V, GlobalVariables::VOUCHER_V_VALUE));
        $cartExample->addProduct(new Product(GlobalVariables::PRODUCT_B, GlobalVariables::PRICE_PRODUCT_B));
        $cartExample->addVoucher(new Voucher(GlobalVariables::VOUCHER_R, GlobalVariables::VOUCHER_R_VALUE));
        $cartExample->addProduct(new Product(GlobalVariables::PRODUCT_C, GlobalVariables::PRICE_PRODUCT_C));
        $cartExample->addProduct(new Product(GlobalVariables::PRODUCT_C, GlobalVariables::PRICE_PRODUCT_C));
        $cartExample->addProduct(new Product(GlobalVariables::PRODUCT_C, GlobalVariables::PRICE_PRODUCT_C));

        return $cartExample;
    }
}