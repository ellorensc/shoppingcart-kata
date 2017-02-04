<?php

namespace shoppingcart\common;

/**
 * Class GlobalVariables
 *
 * @package shoppingcart\common
 * @author      Eduardo Llorens <ellorensc@gmail.com>
 * @version     1.0
 */
class GlobalVariables
{
    const PRODUCT_A = 'Product A';
    const PRODUCT_B = 'Product B';
    const PRODUCT_C = 'Product C';

    const PRICE_PRODUCT_A = 10;
    const PRICE_PRODUCT_B = 8;
    const PRICE_PRODUCT_C = 12;

    const VOUCHER_V = '10% off discount voucher for the second unit applying only to product type A';
    const VOUCHER_R = '5€ off discount on product type B';
    const VOUCHER_S = '5% off discount on a cart value over 40€';

    const VOUCHER_V_VALUE = 0.1;
    const VOUCHER_R_VALUE = 5;
    const VOUCHER_S_VALUE = 0.05;
}
