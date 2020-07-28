<?php

declare(strict_types=1);

use Rector\Laravel\Rector\Class_\InlineValidationRulesToArrayDefinitionRector;
use Rector\Laravel\Rector\StaticCall\Redirect301ToPermanentRedirectRector;
use Rector\Php74\Rector\Assign\NullCoalescingOperatorRector;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\Php74\Rector\FuncCall\ArraySpreadInsteadOfArrayMergeRector;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set('php_version_features', '7.4');

    $services = $containerConfigurator->services();

    $services->set(ClosureToArrowFunctionRector::class);

    $services->set(TypedPropertyRector::class);

    $services->set(InlineValidationRulesToArrayDefinitionRector::class);

    $services->set(Redirect301ToPermanentRedirectRector::class);

    $services->set(ArraySpreadInsteadOfArrayMergeRector::class);

    $services->set(NullCoalescingOperatorRector::class);
};
