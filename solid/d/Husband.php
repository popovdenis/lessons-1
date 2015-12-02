<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:26
 */
class lowRankingMale
{
    public function eat()
    {
        $wife = new Wife();
        $food = $wife->getFood();
        // ... eat
    }
}

class averageRankingMale
{
    private $wife;

    public function __construct(Wife $wife)
    {
        $this->wife = $wife;
    }

    public function eat()
    {
        $food = $this->wife->getFood();
        // ... eat
    }
}

class highRankingMale
{
    private $foodProvider;

    public function __construct(IFoodProvider $foodProvider)
    {
        $this->foodProvider = $foodProvider;
    }

    public function eat()
    {
        $food = $this->foodProvider->getFood();
        // ... eat
    }
}