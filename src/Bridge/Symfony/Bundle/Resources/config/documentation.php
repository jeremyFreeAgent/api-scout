<?php

/*
 * This file is part of the ApiScout project.
 *
 * Copyright (c) 2023 ApiScout
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

// This file is the entry point to configure your own services.
// Files in the packages/ subdirectory configure your dependencies.

// Put parameters here that don't need to change on each machine where the app is deployed
// https://symfony.com/doc/current/best_practices.html#use-parameters-for-application-configuration
use ApiScout\Documentation\Action\DocumentationAction;
use ApiScout\OpenApi\Factory\OpenApiFactoryInterface;
use ApiScout\Resource\Factory\ResourceCollectionFactoryInterface;

return static function (ContainerConfigurator $container): void {
    $services = $container->services()
        ->defaults()
    ;
    $services
        ->set(DocumentationAction::class)
        ->arg('$resourceCollectionFactory', service(ResourceCollectionFactoryInterface::class))
        ->arg('$openApiFactory', service(OpenApiFactoryInterface::class))
        ->arg('$title', param('api_scout.title'))
        ->arg('$description', param('api_scout.description'))
        ->arg('$version', param('api_scout.version'))
    ;
};
