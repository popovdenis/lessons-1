<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:04
 */

/**
 * SOLID
 * O - Принцип открытости/закрытости
 * open/closed principle
 */

//$logger = new Logger();
//$product = new Product($logger);
//$product->setProduct(10);

$loggerDb  = new DBLogger();
$loggerFile = new FileLogger();
$product = new Product($loggerFile);
$product->setPrice(10);