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
    public static function getFilePath($fileDist){
        if($fileDist == 'Meatballs') {
            return 'commentsMeatballs.txt';
        }
        elseif ($fileDist == 'Pancakes'){
            return 'commentsPancakes.txt';
        }
        return NULL;
    }
    private static function defineConstants(){
        self::defineConstant('CMT', 'comment' );
        self::defineConstant('USER','username');
        self::defineConstant('TIMESTAMP', 'timestamp');
        self::defineConstant('VIEWS', 'resources/views/');
        self::defineConstant('FRAGMENTS', 'resources/fragments/');
        self::defineConstant('PASSWORD', 'password');
        self::defineConstant('CMT_MEATBALLS', 'commentsMeatballs.txt');
        self::defineConstant('CMT_PANCAKES', 'commentsPancakes.txt');
        self::defineConstant('ENTRY_DELIMITER', ";\n");
    }
    private static function defineConstant($param, $value){
        define(self::SYMBOL_PREFIX . $param, $value);
    }
}