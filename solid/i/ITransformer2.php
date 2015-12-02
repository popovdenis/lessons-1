<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:21
 */
interface ICarTransformer {
    public function toCar();
}

interface IPlaneTransformer {
    public function toPlane();
}

interface IShipTransformer {
    public function toShip();
}