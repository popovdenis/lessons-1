<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:21
 */
interface ISuperTransformer
{
    public function toCar();
    public function toPlane();
    public function toShip();
}