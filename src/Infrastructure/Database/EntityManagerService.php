<?php

declare(strict_types=1);

namespace Wratche\App\Infrastructure\Database;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class EntityManagerService
{

    public static function getService(): EntityManager
    {
        // Create a simple "default" Doctrine ORM configuration for Annotations
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
//config via .ENV
        $config = Setup::createAnnotationMetadataConfiguration(
                [__DIR__."/src"],
                $isDevMode,
                $proxyDir,
                $cache,
                $useSimpleAnnotationReader
        );
        $connectionParams = [
                'dbname' => 'eshop',
                'user' => 'postgres',
                'password' => 'changeme',
                'host' => 'postgres',
                'port' =>'5432',
                'driver' => 'pdo_mysql',
        ];
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

// obtaining the entity manager
        $entityManager = EntityManager::create($conn, $config);
        return $entityManager;
    }
}

