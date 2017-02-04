<?php

namespace shoppingcart\cart;

use shoppingcart\product\Product;
use shoppingcart\voucher\Voucher;

/**
 * Interface CartInterface
 *
 * @package shoppingcart\cart
 * @author Eduardo Llorens <ellorensc@gmail.com>
 * @version 1.0
 */
interface CartInterface
{
    public function addProduct(Product $product);
    public function addVoucher(Voucher $voucher);
}
