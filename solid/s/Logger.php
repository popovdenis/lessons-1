<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 07.11.2015
 * Time: 11:04
 */
class Logger
{
    private function saveToFile($message)
    {
        // save to file message
    }

    public function log($message)
    {
        $this->saveToFile($message);
    }
}