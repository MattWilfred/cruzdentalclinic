<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit2daacea0166e5d7135c3cc8e2ff0061f
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit2daacea0166e5d7135c3cc8e2ff0061f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit2daacea0166e5d7135c3cc8e2ff0061f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit2daacea0166e5d7135c3cc8e2ff0061f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
