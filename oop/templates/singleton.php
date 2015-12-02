<?php

/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 24.10.2015
 * Time: 14:50
 */
class Singleton
{
    private static $instance = null;

    private function __construct()
    {}

    private function __clone() {}

    private function __wakeup() {}

    private function __sleep() {}

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

$news1 = Singleton::getInstance();
//$news_1 = unserialize(serialize($news1));
//$news_1 = clone $news1;
$news2 = Singleton::getInstance();
$news3 = Singleton::getInstance();
$news4 = Singleton::getInstance();

echo '<pre>';
var_dump($news1);
echo '</pre>';

echo '<pre>';
var_dump($news2);
echo '</pre>';

//echo '<pre>';
//var_dump($news_1);
//echo '</pre>';

echo '<pre>';
var_dump($news3);
echo '</pre>';

echo '<pre>';
var_dump($news4);
echo '</pre>';

//$news  = new Singleton();
//$news  = new Singleton();
//$news  = new Singleton();
//$news  = new Singleton();