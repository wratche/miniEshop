<?php

declare(strict_types=1);

namespace Wratche\Tests\Product;

use PHPUnit\Framework\TestCase;
use Wratche\Domain\Product\ProductFactory;

class ProductFactoryTest extends TestCase
{
    public function testCreateProduct(): void
    {
        $factory = new ProductFactory();
        $factory->createProduct();
        self::assertFalse($this->hasFailed());
    }
}
