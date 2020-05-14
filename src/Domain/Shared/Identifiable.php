<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Shared;

interface Identifiable
{
    public function getId(): Id;
}
