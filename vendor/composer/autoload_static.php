<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1a2f56a840c0b4c4bacb6df275238564
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Doctrine\\Common\\Annotations\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Doctrine\\Common\\Annotations\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/annotations/lib/Doctrine/Common/Annotations',
        ),
    );

    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Doctrine\\Common\\Lexer\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/lexer/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1a2f56a840c0b4c4bacb6df275238564::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1a2f56a840c0b4c4bacb6df275238564::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit1a2f56a840c0b4c4bacb6df275238564::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
