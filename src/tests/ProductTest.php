<?php

namespace tests;

use PHPUnit_Framework_TestCase;
use shoppingcart\common\GlobalVariables;
use shoppingcart\product\Product;

/**
 * Class ProductTest
 * @package tests
 */
class ProductTest extends PHPUnit_Framework_TestCase
{
    public function testCallOneInstanceProduct()
    {
        $product = new Product(GlobalVariables::PRODUCT_B, GlobalVariables::PRICE_PRODUCT_B);
        $this->assertSame($product->getName(), $product->getName());
    }

    public function testProductHasName()
    {
        $product = new Product(GlobalVariables::PRODUCT_A, GlobalVariables::PRICE_PRODUCT_A);

        $this->assertNotNull($product->getName());
    }

    public function testProductHasPrice()
    {
        $product = new Product(GlobalVariables::PRODUCT_A, GlobalVariables::PRICE_PRODUCT_A);

        $this->assertNotNull($product->getPrice());
    }

    public function testProductIsNotFree()
    {
        $product = new Product(GlobalVariables::PRODUCT_A, GlobalVariables::PRICE_PRODUCT_A);

        $this->assertNotNull($product->getPrice());
        $this->assertGreaterThan(0,$product->getPrice());
    }
}