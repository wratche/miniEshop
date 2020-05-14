<?php

declare(strict_types=1);

namespace Wratche\Tests\Cart;

use PHPUnit\Framework\TestCase;
use Wratche\Domain\Cart\Cart;
use Wratche\Domain\Product\ProductFactory;
use Wratche\Domain\Product\Products;

class CartTest extends TestCase
{
    protected Cart $cart;

    protected function setUp(): void
    {
        $productCollection = new Products();
        $this->cart = new Cart($productCollection);
    }
    public function testCreateValidCart(): void
    {
        $productCollection = new Products();
        new Cart($productCollection);
        self::assertFalse($this->hasFailed());
    }

    public function testAddProduct(): void
    {
        $product = (new ProductFactory())->createProduct();
        $this->cart->addProduct($product);
        self::assertFalse($this->hasFailed());
    }
}
