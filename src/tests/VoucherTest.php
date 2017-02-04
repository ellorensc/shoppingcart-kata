<?php

namespace tests;

use PHPUnit_Framework_TestCase;
use shoppingcart\common\GlobalVariables;
use shoppingcart\voucher\Voucher;

/**
 * Class VoucherTest
 * @package tests
 */
class VoucherTest extends PHPUnit_Framework_TestCase
{
    public function testCallOneInstanceVoucher()
    {
        $voucher = new Voucher(GlobalVariables::VOUCHER_V, GlobalVariables::VOUCHER_V_VALUE);
        $this->assertSame($voucher->getName(), $voucher->getName());
    }

    public function testVoucherHasName()
    {
        $voucher = new Voucher(GlobalVariables::VOUCHER_V, GlobalVariables::VOUCHER_V_VALUE);

        $this->assertNotNull($voucher->getName());
    }

    public function testVoucherHasDiscountValue()
    {
        $voucher = new Voucher(GlobalVariables::VOUCHER_V, GlobalVariables::VOUCHER_V_VALUE);

        $this->assertNotNull($voucher->getRawPrice());
    }
}