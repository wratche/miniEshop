<?php

declare(strict_types=1);

namespace Wratche\App\Domain\Model\Product;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     */
    private float $price;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="int")
     */
    private ProductId $id;

    public function __construct(int $id, string $name, int $price)
    {
        $this->id = new ProductId($id);
        $this->name = $name;
        $this->price = $price;
    }

    public function getId(): ProductId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
