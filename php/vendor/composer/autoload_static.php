<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit987fb120df82ad64258d726322d5a8e8
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'ZipStream\\' => 10,
        ),
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Http\\Client\\' => 16,
            'PhpOffice\\PhpSpreadsheet\\' => 25,
        ),
        'M' => 
        array (
            'Matrix\\' => 7,
        ),
        'C' => 
        array (
            'Complex\\' => 8,
            'Com\\Tecnick\\Unicode\\Data\\' => 25,
            'Com\\Tecnick\\Unicode\\' => 20,
            'Com\\Tecnick\\Pdf\\Page\\' => 21,
            'Com\\Tecnick\\Pdf\\Image\\' => 22,
            'Com\\Tecnick\\Pdf\\Graph\\' => 22,
            'Com\\Tecnick\\Pdf\\Font\\' => 21,
            'Com\\Tecnick\\Pdf\\Encrypt\\' => 24,
            'Com\\Tecnick\\Pdf\\' => 16,
            'Com\\Tecnick\\File\\' => 17,
            'Com\\Tecnick\\Color\\' => 18,
            'Com\\Tecnick\\Barcode\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ZipStream\\' => 
        array (
            0 => __DIR__ . '/..' . '/maennchen/zipstream-php/src',
        ),
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
            1 => __DIR__ . '/..' . '/psr/http-factory/src',
        ),
        'Psr\\Http\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-client/src',
        ),
        'PhpOffice\\PhpSpreadsheet\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/phpspreadsheet/src/PhpSpreadsheet',
        ),
        'Matrix\\' => 
        array (
            0 => __DIR__ . '/..' . '/markbaker/matrix/classes/src',
        ),
        'Complex\\' => 
        array (
            0 => __DIR__ . '/..' . '/markbaker/complex/classes/src',
        ),
        'Com\\Tecnick\\Unicode\\Data\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-unicode-data/src',
        ),
        'Com\\Tecnick\\Unicode\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-unicode/src',
        ),
        'Com\\Tecnick\\Pdf\\Page\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-pdf-page/src',
        ),
        'Com\\Tecnick\\Pdf\\Image\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-pdf-image/src',
        ),
        'Com\\Tecnick\\Pdf\\Graph\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-pdf-graph/src',
        ),
        'Com\\Tecnick\\Pdf\\Font\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-pdf-font/src',
        ),
        'Com\\Tecnick\\Pdf\\Encrypt\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-pdf-encrypt/src',
        ),
        'Com\\Tecnick\\Pdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-pdf/src',
        ),
        'Com\\Tecnick\\File\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-file/src',
        ),
        'Com\\Tecnick\\Color\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-color/src',
        ),
        'Com\\Tecnick\\Barcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/tecnickcom/tc-lib-barcode/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit987fb120df82ad64258d726322d5a8e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit987fb120df82ad64258d726322d5a8e8::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit987fb120df82ad64258d726322d5a8e8::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit987fb120df82ad64258d726322d5a8e8::$classMap;

        }, null, ClassLoader::class);
    }
}
