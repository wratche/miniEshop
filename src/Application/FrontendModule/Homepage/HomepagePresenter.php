<?php

declare(strict_types=1);

namespace Wratche\App\Application\FrontendModule\Homepage;

use Doctrine\ORM\EntityManager;
use Nette;
use Wratche\App\Application\UI\Presenter\StructuredTemplates;
use Wratche\App\Infrastructure\Database\Repositories\ProductRepository;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    use StructuredTemplates;

    private ProductRepository $productRepository;

    public function __construct(ProductRepository $entity)
    {
        parent::__construct();
        $this->productRepository = $entity;
    }

    public function renderDefault(int $page = 1): void
    {
        $this->template->page = $page;
        $this->template->posts = $this->productRepository->findAll();
    }
}
