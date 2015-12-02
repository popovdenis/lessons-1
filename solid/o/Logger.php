<?php

/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:04
 */
class FileLogger implements ILogger
{
    private function saveToFile($message)
    {
        //...
    }

    public function log($message)
    {
        //...
        $this->saveToFile($message);
    }
}

class DBLogger implements ILogger
{
    private function saveToDB($message)
    {
        //...
    }

    public function log($message)
    {
        //...
        $this->saveToDB($message);
    }
}