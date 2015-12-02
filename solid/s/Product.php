<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 10:59
 */
class Product
{
    public function setPrice($price)
    {
        try {
            // save price
        } catch (Database $exception) {
            $this->logError($exception->getMessage());
        }
    }

    public function logError($error) {
        // save error
    }
}