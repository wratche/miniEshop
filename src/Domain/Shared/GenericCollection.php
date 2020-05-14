<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Shared;

abstract class GenericCollection implements \IteratorAggregate
{
    protected array $values;

    public function toArray(): array
    {
        return $this->values;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->values);
    }
}
