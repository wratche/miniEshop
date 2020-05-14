<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
$entityManager = (new \Wratche\App\Infrastructure\Database\EntityManagerService())->getService();

Sentry\init(['dsn' => 'https://cd3d3bf2cc984ec39b955d79fa4fe9e9@o392378.ingest.sentry.io/5239787' ]);

Wratche\App\Application\Bootstrap::boot()
    ->createContainer()
    ->getByType(Nette\Application\Application::class)
    ->run();
