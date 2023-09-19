<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2f6cf2a0465b1ce4e082e13942bd3197
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Bankas\\Db\\' => 10,
        ),
        'A' => 
        array (
            'App\\Db\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Bankas\\Db\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/app',
        ),
        'App\\Db\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/app/db',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2f6cf2a0465b1ce4e082e13942bd3197::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2f6cf2a0465b1ce4e082e13942bd3197::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2f6cf2a0465b1ce4e082e13942bd3197::$classMap;

        }, null, ClassLoader::class);
    }
}
