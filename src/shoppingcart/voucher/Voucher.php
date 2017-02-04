<?php

namespace shoppingcart\voucher;

/**
 * Class Voucher
 * @package shoppingcart\voucher
 * @author      Eduardo Llorens <ellorensc@gmail.com>
 * @version     1.0
 */
class Voucher
{
    /** @var  string */
    protected $name;

    /** @var  float */
    protected $rawPrice;

    /**
     * @param $name
     * @param $rawPrice
     * @throws VoucherException
     */
    public function __construct($name, $rawPrice)
    {
        if (empty($name)) {
            throw new VoucherException('The Voucher name should be filled');
        }

        if (empty($rawPrice)) {
            throw new VoucherException('The Voucher raw price should be filled');
        }

        if (!is_float($rawPrice) && !is_int($rawPrice)) {
            throw new VoucherException('The Voucher raw price should be a number');
        }

        $this->name = $name;
        $this->rawPrice = $rawPrice;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getRawPrice()
    {
        return $this->rawPrice;
    }

    /**
     * @param float $rawPrice
     */
    public function setRawPrice($rawPrice)
    {
        $this->rawPrice = $rawPrice;
    }
}
