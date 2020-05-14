<?php

declare(strict_types=1);

namespace Wratche\Tests\Category;

use Wratche\Domain\Category\Category;

class TestCategoryFactory
{
    public function getCategory(): Category
    {
        return new Category(1, 'Test', 'test-url', true);
    }

    public function getCategoryArray(): array
    {
        $first = new Category(1, 'Nabytek', 'nabytek', true);
        $second = new Category(2, 'Loznice', 'loznice', true);
        $third = new Category(3, 'Postele', 'postele', false);
        return [$first, $second, $third];
    }
}
