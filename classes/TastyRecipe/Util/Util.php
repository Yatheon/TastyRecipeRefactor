<?php
namespace TastyRecipe\Util;

class Util
{
    const SYMBOL_PREFIX = 'KEY_';

    private function __construct() {

    }

    public static function initRequest(){
        spl_autoload_register(function ($class) {
            require_once 'classes/' . \str_replace('\\', '/', $class) . '.php';
        });

        session_start();
        self::defineConstants();
    }
    private static function defineConstants(){
        self::defineConstant('CMT', 'comment' );
        self::defineConstant('USER','username');
        self::defineConstant('TIMESTAMP', 'timestamp');
        self::defineConstant('VIEWS', 'resources/views/');
        self::defineConstant('FRAGMENTS', 'resources/fragments/');
    }
    private static function defineConstant($param, $value){
        define(self::SYMBOL_PREFIX . $param, $value);
    }
}