<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd5555961f7206ed5e67185e52c15cb75
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jsyqw\\Layuigii\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jsyqw\\Layuigii\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd5555961f7206ed5e67185e52c15cb75::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd5555961f7206ed5e67185e52c15cb75::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}