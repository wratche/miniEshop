<?php

declare(strict_types=1);

namespace Wratche\Tests\Cart;

use PHPUnit\Framework\TestCase;
use Wratche\Domain\Cart\Cart;
use Wratche\Domain\Cart\SummaryCart;
use Wratche\Domain\Product\ProductFactory;
use Wratche\Domain\Product\Products;

class SummaryCartTest extends TestCase
{
    public function testCartSummary(): void
    {
        $products = new Products();
        $cart = new Cart($products);
        $productFactory = new ProductFactory();
        for ($i = 0; $i < 100; $i++) {
            $cart->addProduct($productFactory->createProduct());
        }

        $summary = new SummaryCart($products);
        self::assertNotEquals(count($products->toArray()), $summary->getFormattedProducts());
    }
}
