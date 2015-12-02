<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:21
 */
class SuperTransformer implements ICarTransformer, IPlaneTransformer, IShipTransformer {
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

class CarTransformer implements ICarTransformer {
    public function toCar(){
        echo 'transform to car';
    }
}
