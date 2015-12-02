<?php

/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:28
 */

/**
 * SOLID
 * D - принцип инверсии зависимостей
 * Dependency Inversion Principle
 */
class Restaurant implements IFoodProvider
{
    public function getFood()
    {
        // ...
        return $food;
    }
}