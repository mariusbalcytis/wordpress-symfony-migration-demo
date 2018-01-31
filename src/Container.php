<?php

namespace App;

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

class Container
{
    /**
     * @var Kernel
     */
    private static $kernel;

    public static function setupKernel()
    {
        if (self::$kernel !== null) {
            return self::$kernel;
        }

        $env = $_SERVER['APP_ENV'] ?? 'dev';
        $debug = $_SERVER['APP_DEBUG'] ?? ('prod' !== $env);

        if ($debug) {
            umask(0000);

            Debug::enable();
        }

        if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? false) {
            Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
        }

        if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? false) {
            Request::setTrustedHosts(explode(',', $trustedHosts));
        }

        $kernel = new Kernel($env, $debug);
        $kernel->boot();

        self::$kernel = $kernel;

        return $kernel;
    }

    public static function get($serviceId)
    {
        return self::$kernel->getContainer()->get($serviceId);
    }
}
