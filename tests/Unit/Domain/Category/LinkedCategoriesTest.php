<?php

declare(strict_types=1);

namespace Wratche\Tests\Category;

use PHPUnit\Framework\TestCase;
use Wratche\Domain\Category\Category;
use Wratche\Domain\Category\LinkedCategories;

class LinkedCategoriesTest extends TestCase
{
    private LinkedCategories $categoryCollection;
    private TestCategoryFactory $categoryFactory;

    public function setUp(): void
    {
        $this->categoryCollection = new LinkedCategories();
        $this->categoryFactory = new TestCategoryFactory();
    }

    public function tearDown(): void
    {
        unset($this->categoryCollection);
    }

    public function testCollection(): void
    {
        self::assertTrue($this->categoryCollection->isEmpty());

        $firstCategory = $this->categoryFactory->getCategory();
        $this->categoryCollection->push($firstCategory);
        self::assertFalse($this->categoryCollection->isEmpty());
        self::assertSame($firstCategory, $this->categoryCollection->bottom());

        for ($i = 1; $i < 4; $i++) {
            $this->categoryCollection->push($this->categoryFactory->getCategory());
        }
        $lastCategory = $this->categoryFactory->getCategory();
        $this->categoryCollection->push($lastCategory);
        self::assertCount(5, $this->categoryCollection);
        self::assertSame($lastCategory, $this->categoryCollection->top());
    }

    public function testWrongCreateCollection(): void
    {
        $this->expectException(\UnexpectedValueException::class);

        $categories = new LinkedCategories();
        $categories->push([]);
        $categories->push('');
    }

    public function testGetFullCategoryName(): void
    {
        $categories = $this->categoryFactory->getCategoryArray();
        foreach ($categories as $category) {
            $this->categoryCollection->push($category);
        }
        self::assertSame('Nabytek - Loznice', $this->categoryCollection->getFullCategoryName());
        self::assertSame('Nabytek | Loznice', $this->categoryCollection->getFullCategoryName(' | '));
        self::assertSame('Nabytek => Loznice', $this->categoryCollection->getFullCategoryName(' => '));
    }

    public function testHaveCategory(): void
    {
        $category = $this->categoryFactory->getCategory();
        $category2 = new Category(1, 'Test', 'test-url', true);

        $this->categoryCollection->push($category);
        self::assertTrue($this->categoryCollection->haveCategory($category));
        self::assertTrue($this->categoryCollection->haveCategory($category2));

        $notInCollectionCategory = new Category(666, 'Test', 'test-url', true);
        self::assertFalse($this->categoryCollection->haveCategory($notInCollectionCategory));
    }
}
