<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Product;

/**
 * @method Product[] toArray()
 */
class Products extends \Wratche\App\Domain\Model\GenericCollection
{
    public function __construct(Product...$products)
    {
        $this->values = $products;
    }
}
