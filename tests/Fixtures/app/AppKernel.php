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

namespace ApiScout\Tests\Fixtures\app;

use ApiScout\Bridge\Symfony\Bundle\ApiScoutBundle;
use ApiScout\Tests\Fixtures\TestBundle\TestBundle;
use FriendsOfBehat\SymfonyExtension\Bundle\FriendsOfBehatSymfonyExtensionBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\ErrorHandler\ErrorRenderer\ErrorRendererInterface;
use Symfony\Component\HttpFoundation\Session\SessionFactory;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

final class AppKernel extends Kernel
{
    use MicroKernelTrait;

    public function __construct(string $environment, bool $debug)
    {
        parent::__construct($environment, $debug);

        // patch for behat/symfony2-extension not supporting %env(APP_ENV)%
        $this->environment = $_SERVER['APP_ENV'] ?? $environment;
    }

    public function getProjectDir(): string
    {
        return __DIR__;
    }

    public function registerBundles(): iterable
    {
        $bundles = [
            new ApiScoutBundle(),
            new FriendsOfBehatSymfonyExtensionBundle(),
            new TwigBundle(),
            new FrameworkBundle(),
        ];

        $bundles[] = new TestBundle();

        return $bundles;
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import(__DIR__.'/config/routes/routes.php');
    }

    protected function configureContainer(ContainerBuilder $container, LoaderInterface $loader): void
    {
        /**
         * @var string $env
         */
        $env = $container->getParameter('kernel.environment');

        $loader = new PhpFileLoader(
            $container,
            new FileLocator(__DIR__.'/config'),
            $env
        );

        $loader->load('services.php');

        $container->prependExtensionConfig('framework', [
            'secret' => 'marvin.fr',
            'validation' => ['enable_annotations' => true],
            'serializer' => ['enable_annotations' => true],
            'test' => null,
            'session' => class_exists(SessionFactory::class) ? ['storage_factory_id' => 'session.storage.factory.mock_file'] : ['storage_id' => 'session.storage.mock_file'],
            'profiler' => [
                'enabled' => true,
                'collect' => false,
            ],
            'router' => ['utf8' => true],
            'http_method_override' => false,
        ]);

        $twigConfig = ['strict_variables' => '%kernel.debug%'];
        if (interface_exists(ErrorRendererInterface::class)) {
            $twigConfig['exception_controller'] = null;
        }
        $container->prependExtensionConfig('twig', $twigConfig);
    }

    /**
     * Gets the path to the configuration directory.
     */
    private function getConfigDir(): string
    {
        return $this->getProjectDir().'/config';
    }

    /**
     * Gets the path to the bundles configuration file.
     */
    private function getBundlesPath(): string
    {
        return $this->getConfigDir().'/bundles.php';
    }
}
