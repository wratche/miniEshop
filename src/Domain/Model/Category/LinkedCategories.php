<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Category;

class LinkedCategories extends \SplDoublyLinkedList
{
    public function push($value): void
    {
        if (!$value instanceof Category) {
            throw new \UnexpectedValueException('Unexpect value.');
        }

        parent::push($value);
    }

    public function getFullCategoryName(string $delimeter = ' - '): string
    {
        $categoryFullName = '';
        foreach ($this as $category) {
            if (!$category->isActive()) {
                continue;
            }

            if ($this->current() !== $this->bottom() && $this->current() !== $this->top()) {
                $categoryFullName .= $delimeter;
            }

            $categoryFullName .= $category->getName();
        }

        return $categoryFullName;
    }

    public function haveCategory(Category $checkedCategory): bool
    {
        foreach ($this as $category) {
            if ($category->getId() === $checkedCategory->getId()) {
                return true;
            }
        }
        return false;
    }
}
