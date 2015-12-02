<?php

/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 29.10.2015
 * Time: 23:17
 */
include_once "Iterator.php";

class MyCollection implements IteratorAggregate
{
    public $firstname = "Kate";

    public $lastname = "Ross";

    public $email = "kate.ross@mail.coom";

    public function __construct()
    {
        $this->phone = "777-000-345";
    }

    public function getIterator()
    {
        return new ArrayIterator($this);
    }
}

$obj = new MyCollection;

foreach ($obj as $key => $value) {
    var_dump($key, $value);
    echo "<br>";
}