<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Product;

use Wratche\App\Domain\Model\Category\Category;
use Wratche\App\Domain\Model\Category\LinkedCategories;
use Wratche\App\Domain\Model\Tag\ProductTag;
use Wratche\App\Domain\Model\Tag\Tags;

/**
 * @todo refaktorovat v neco jineho
 */
class ProductFactory
{
    public function createProduct(): Product
    {
        $product = new Product(
            random_int(0, 4),
            'Testovaci produkt',
            0
        );

        $rand = random_int(0, 5);
        $randTags = [];
        for ($i = 0; $i < $rand; $i++) {
            $randTags[] = new ProductTag();
        }
        $tags = new Tags(...$randTags);
        $product->setTags($tags);

        $categories = new LinkedCategories();
        $categories->push(new Category(1, 'Nabytek', 'nabytek', true));
        $product->setCategories($categories);

        return clone $product;
    }
}
