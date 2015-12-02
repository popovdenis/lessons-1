<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:21
 */

/**
 * SOLID
 * I - Принцип разделения интерфеса
 * Interface Segregation Principle
 */
class SuperTransformer implements ISuperTransformer {
    public function toCar(){
        echo 'transform to car';
    }

    public function toPlane(){
        echo 'transform to plane';
    }

    public function toShip(){
        echo 'transform to ship';
    }
}

class CarTransformer implements ISuperTransformer {
    public function toCar(){
        echo 'transform to car';
    }

    public function toPlane(){
        throw new Exception('i can`t transform to plane');
    }

    public function toShip(){
        throw new Exception('i can`t transform to ship');
    }
}