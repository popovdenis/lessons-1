<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:04
 */

/**
 * SOLID
 * S - Принцип единственной обязанности (ответственности)
 * single responsibility principle
 */

//$product = new Product();
//$product->setPrice(10);

$logger = new Logger();
$product = new Product($logger);
$product->setPrice(10);
