<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 10:59
 */
class Product
{
    private $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    public function setProduct($price)
    {
        try {
            // save price
        } catch (Database $exception) {
            $this->logger->log($exception->getMessage());
        }
    }
}