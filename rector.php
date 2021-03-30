<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\PostRector\Rector\NameImportingPostRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::PATHS, [
        __DIR__.'/app',
        __DIR__.'/tests',
    ]);

    $parameters->set(Option::SKIP, [
        __DIR__.'/config',

        NameImportingPostRector::class => [
            __DIR__.'/app/Http/Kernel.php',
        ],

    ]);

    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_80);

    $parameters->set(Option::AUTO_IMPORT_NAMES, true);

    $parameters->set(Option::ENABLE_CACHE, true);

    $parameters->set(Option::SETS, [
        SetList::PHP_80,
        SetList::PHPUNIT_91,
    ]);
};
