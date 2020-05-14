<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Category;

class BuildCategoryListByProduct
{
    public function build(int $productId): LinkedCategories
    {
        $rand = random_int(0, 5);
        $categories = new LinkedCategories();
        for ($i = 0; $i < $rand; $i++) {
            $categories->push(new Category($i, $i . '-category'));
        }
        return $categories;
    }
}
