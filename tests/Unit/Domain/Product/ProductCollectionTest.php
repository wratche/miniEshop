<?php

declare(strict_types=1);

namespace Wratche\Tests\Product;

use PHPUnit\Framework\TestCase;
use Wratche\Domain\Cart\Cart;
use Wratche\Domain\Product\ProductFactory;
use Wratche\Domain\Product\Products;

class ProductCollectionTest extends TestCase
{
    public function testAddProduct(): void
    {
        $productCollection = new Products();
        $cart = new Cart($productCollection);

        $product = (new ProductFactory())->createProduct();
        $cart->addProduct($product);

        self::assertCount(1, $cart->getProducts());
    }

    public function testRemoveProduct(): void
    {
        $product = (new ProductFactory())->createProduct();
        $productCollection = new Products();

        $cart = new Cart($productCollection);
        self::assertEmpty($cart->getProducts());

        $cart->addProduct($product);
        self::assertEquals([$product], $cart->getProducts());

        $cart->removeProduct($product);

        self::assertEmpty($cart->getProducts());
    }

    public function testCreationProducts(): void
    {
        $productFactory = new ProductFactory();
        $product = $productFactory->createProduct();
        $product2 = $productFactory->createProduct();

        self::assertNotSame(spl_object_hash($product), spl_object_hash($product2));
    }
}
