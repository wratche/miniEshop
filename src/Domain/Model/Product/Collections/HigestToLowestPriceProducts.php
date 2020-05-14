<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Product\Sorting;

class HigestToLowestPriceProducts
{
    private \Wratche\App\Domain\Model\Product\Products $products;

    public function __construct(\Wratche\App\Domain\Model\Product\Products $products)
    {
        $this->products = $products;
    }

    public function getProducts(): \Wratche\App\Domain\Model\Product\Products
    {
        //foreach + iterator
    }
}
