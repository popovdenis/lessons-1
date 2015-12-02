<?php
class Controller
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }
}