<?php

/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:04
 */
class BirdRun
{
    private $bird;

    public function __construct(Bird $bird)
    {
        $this->bird = $bird;
    }

    public function run()
    {
        $flySpeed = $this->bird->fly();
    }
}