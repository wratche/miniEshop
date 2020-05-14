<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Category;

class Category
{
    private string $name;
    private int $id;
    private string $url;
    private bool $active;

    public function __construct(int $id, string $name, string $url, bool $active = true)
    {
        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
        $this->active = $active;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function isActive(): bool
    {
        return $this->active;
    }
}
