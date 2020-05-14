<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Repository;

interface ProductRepository
{
    public function getById(int $id);

}
