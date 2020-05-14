<?php

declare(strict_types=1);

namespace Wratche\Tests\Product;

use PHPUnit\Framework\TestCase;
use Wratche\Domain\Product\ProductFactory;
use Wratche\Domain\Tag\ProductTag;
use Wratche\Domain\Tag\Tags;

class ProductTest extends TestCase
{
    public function testProductParameters(): void
    {
        $product = (new ProductFactory())->createProduct();

        self::assertSame('Testovaci produkt', $product->getName());
        self::assertSame(0.0, $product->getPrice());
    }

    public function testProductWithTags(): void
    {
        $product = (new ProductFactory())->createProduct();

        $tag = new ProductTag();
        $tag2 = new ProductTag();

        $tags = new Tags($tag, $tag2);
        $product->setTags($tags);

        self::assertSame($tags, $product->getTags());
    }

    public function testProductAddTags(): void
    {
        $product = (new ProductFactory())->createProduct();

        $tag = new ProductTag();
        $tag2 = new ProductTag();
        $tags = new Tags($tag, $tag2);

        //todo presunout do testu se stitkama
        $product->setTags($tags);
        self::assertCount(2, $product->getTags()->toArray());
        $newTagToAdd = new ProductTag();

        $newTagsCollection = new Tags($newTagToAdd, ...$tags->toArray());
        $product->setTags($newTagsCollection);
        self::assertCount(3, $product->getTags()->toArray());
    }

    public function testProductWithoutTags(): void
    {
        $product = (new ProductFactory())->createProduct();
        $tags = new Tags();
        $product->setTags($tags);
        $product->getTags();
        self::assertFalse($this->hasFailed());
        self::assertCount(0, $product->getTags());
    }
}
