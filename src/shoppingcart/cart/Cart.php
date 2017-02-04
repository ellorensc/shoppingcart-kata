<?php

namespace shoppingcart\cart;

use Exception;
use shoppingcart\common\GlobalVariables;
use shoppingcart\product\Product;
use shoppingcart\voucher\Voucher;

/**
 * Class Cart
 *
 * @package shoppingcart\cart
 * @author Eduardo Llorens <ellorensc@gmail.com>
 * @version 1.0
 */
class Cart implements CartInterface
{
    /** @var  string */
    private $name;
    /** @var array  */
    private $products = [];
    /** @var array  */
    private $vouchers = [];
    /** @var array  */
    private $cartItems = [];

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
        $this->cartItems[] = $product;
    }

    /**
     * @param Voucher $voucher
     */
    public function addVoucher(Voucher $voucher)
    {
        $this->vouchers = $voucher;
        $this->cartItems[] = $voucher;
    }

    /**
     * @return bool
     */
    private function getSecondUnit()
    {
        $counter = 0;
        foreach($this->cartItems as $cartItem) {
            if ($cartItem instanceof Product) {
                $counter++;

                if ($counter == 2) {
                    return $cartItem;
                }
            }
        }

        return false;
    }

    /**
     * @return int
     * @throws Exception
     */
    public function getSellingPrice()
    {
        $total = 0;
        $previousProduct = '';

        foreach($this->cartItems as $cartItem) {
            if ($cartItem instanceof Product) {
                /** $cartItem Product */
                $total += $cartItem->getPrice();

                $previousProduct = $cartItem->getName();
            } elseif ($cartItem instanceof Voucher) {
                /** $cartItem Voucher */
                $voucherName = $cartItem->getName();

                switch ($voucherName) {
                    case GlobalVariables::VOUCHER_R:
                        if ($previousProduct == GlobalVariables::PRODUCT_B) {
                            $total = $total - GlobalVariables::VOUCHER_R_VALUE;
                        }
                        break;

                    case GlobalVariables::VOUCHER_V:
                        $secondUnit = $this->getSecondUnit();
                        if ($secondUnit) {
                            $total = $total - ($secondUnit * GlobalVariables::VOUCHER_V_VALUE);
                        }
                        break;

                    case GlobalVariables::VOUCHER_S:
                        if ($total > 40) {
                            $total = $total * GlobalVariables::VOUCHER_S_VALUE;
                        }
                        break;

                    default:

                }
            } else {
                throw new Exception('La cesta de la compra debe tener o Products o Vouchers');
            }
        }

        return $total;
    }
}
