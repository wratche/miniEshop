<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Cart;

class SummaryCart
{
    private \Wratche\App\Domain\Model\Product\Products $productCollection;

    public function __construct(\Wratche\App\Domain\Model\Product\Products $productCollection)
    {
        $this->productCollection = $productCollection;
    }

    public function getFormattedProducts(): array
    {
        $formattedArray = [];
        $products = $this->productCollection->toArray();
        foreach ($products as $product) {
            if (!isset($formattedArray[$product->getId()])) {
                $formattedArray[$product->getId()] = [
                    'id' => $product->getId(),
                    'name' => $product->getName(),
                    'price' => $product->getPrice(),
                    'pricePerItem' => $product->getPrice(),
                    'quantity' => 1,
                    'tags' => $product->getTags(),
                    'categories' => $product->getCategories(),
                ];
            } else {
                ++$formattedArray[$product->getId()]['quantity'];
                $formattedArray[$product->getId()]['price']
                    += $formattedArray[$product->getId()]['pricePerItem']
                    * $formattedArray[$product->getId()]['quantity'];
            }
        }

        return $formattedArray;
    }
}
