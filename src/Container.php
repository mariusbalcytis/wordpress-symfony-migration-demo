<?php

namespace Maba\Application;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class Container
{
    /**
     * @var \Symfony\Component\DependencyInjection\Container
     */
    private static $container;

    private static function init()
    {
        if (self::$container !== null) {
            return;
        }

        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator([__DIR__ . '/../config/']));
        $loader->load('services.yml');
        self::$container = $container;
    }

    public static function get($serviceId)
    {
        self::init();
        return self::$container->get($serviceId);
    }
}
