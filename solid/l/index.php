<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:04
 */

/**
 * SOLID
 * L - принцип подстановки Барбары Листов
 * Liskov Substitution Principle
 */

$bird = new Bird();
//$bird = new Duck();
//$bird = new Penguin();
$birdRun = new BirdRun($bird);
$birdRun->run();