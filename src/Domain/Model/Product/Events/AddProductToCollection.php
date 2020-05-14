<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Product\Events;

class AddProductToCollection
{
    private \Wratche\App\Domain\Model\Product\Products $products;

    public function __construct(\Wratche\App\Domain\Model\Product\Products $products)
    {
        $this->products = $products;
    }

    public function addProductToCollection(\Wratche\App\Domain\Model\Product\Product $product): \Wratche\App\Domain\Model\Product\Products
    {
        $arrayProducts = $this->products->toArray();
        return new \Wratche\App\Domain\Model\Product\Products($product, ...$arrayProducts);
    }
}
