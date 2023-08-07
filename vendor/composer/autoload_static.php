<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitee97ca03f0ad287c1deaa308ffd45f39
{
    public static $files = array (
        '7ab00852010148f730ee7e0ec3139fd1' => __DIR__ . '/../..' . '/App/Helpers/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitee97ca03f0ad287c1deaa308ffd45f39::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitee97ca03f0ad287c1deaa308ffd45f39::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitee97ca03f0ad287c1deaa308ffd45f39::$classMap;

        }, null, ClassLoader::class);
    }
}