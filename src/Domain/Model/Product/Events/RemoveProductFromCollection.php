<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Product\Commands;

class RemoveProductFromCollection
{
    private \Wratche\App\Domain\Model\Product\Products $products;

    public function __construct(\Wratche\App\Domain\Model\Product\Products $products)
    {
        $this->products = $products;
    }

    public function removeProductToCollection(\Wratche\App\Domain\Model\Product\Product $product): \Wratche\App\Domain\Model\Product\Products
    {
        $originalProducts = $this->products->toArray();
        foreach ($this->products as $key => $arrayProduct) {
            if ($arrayProduct->getId() === $product->getId()) {
                unset($originalProducts[$key]);
            }
        }

        return new \Wratche\App\Domain\Model\Product\Products(...$originalProducts);
    }
}
