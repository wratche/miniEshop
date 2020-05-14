<?php

declare(strict_types=1);

namespace Wratche\App\Infrastructure\Database\Repositories;

use Doctrine\ORM\EntityManager;
use Wratche\App\Domain\Model\Product\Product;
use Wratche\App\Domain\Model\Shared\DoctrineBaseRepository;

class ProductRepository implements \Wratche\App\Domain\Model\Repository\ProductRepository
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    //todo kdyztak odstrihnout od doctrinebaserepository a udelat si vlastni.

    public function add(Product $cart): void
    {
        $this->entityManager->persist($cart);
    }

    public function getById(int $id)
    {
        // TODO: Implement getById() method.
    }

    public function findAll()
    {
       return $this->entityManager->find(Product::class,1);
    }
}
