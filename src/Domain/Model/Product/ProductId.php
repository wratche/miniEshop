<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Product;

use Wratche\App\Domain\Model\Shared\Id;

class ProductId implements Id
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): Id
    {
        $this->id;
    }
}
