<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Cart;

class Cart
{
    private \Wratche\App\Domain\Model\Product\Products $productCollection;

    public function __construct(\Wratche\App\Domain\Model\Product\Products $productCollection)
    {
        $this->productCollection = $productCollection;
    }

    public function addProduct(\Wratche\App\Domain\Model\Product\Product $product): void
    {
        $command = new \Wratche\App\Domain\Model\Product\Commands\AddProductToCollection($this->productCollection);
        $products = $command->addProductToCollection($product);
        $this->productCollection = $products;
    }

    public function removeProduct(\Wratche\App\Domain\Model\Product\Product $product): void
    {
        $command = new \Wratche\App\Domain\Model\Product\Commands\RemoveProductFromCollection($this->productCollection);
        $products = $command->removeProductToCollection($product);
        $this->productCollection = $products;
    }

    public function getPrice(): float
    {
        $price = 0;

        foreach ($this->productCollection->toArray() as $product) {
            $price += $product->getPrice();
        }

        return $price;
    }

    public function getProducts(): array
    {
        return $this->productCollection->toArray();
    }
}
