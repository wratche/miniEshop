<?php

declare(strict_types=1);

namespace Wratche\App\Application;

use Nette\Configurator;

class Bootstrap
{
    public static function boot(): Configurator
    {
        $configurator = new Configurator();

        $configurator->setDebugMode(true); // enable for your remote IP
        $configurator->enableTracy(__DIR__ . '/../../storage/log');

        $configurator->setTimeZone('Europe/Prague');
        $configurator->setTempDirectory(__DIR__ . '/../../storage/temp');
        $configurator->createRobotLoader()
            ->addDirectory(__DIR__)
            ->register();

        $configurator->addConfig(__DIR__ . '/config/common.neon');
        $configurator->addConfig(__DIR__ . '/config/local.neon');

        return $configurator;
    }
}
