<?php

/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 29.10.2015
 * Time: 23:10
 */
class MyIterator implements Iterator
{
    private $position = 0;

    private $array = array(
        "firstname",
        "lastname",
        "email",
        "phone",
    );

    public function __construct()
    {
        $this->position = 0;
    }

    function rewind()
    {
        var_dump(__METHOD__);
        $this->position = 0;
    }

    function current()
    {
        var_dump(__METHOD__);
        return $this->array[$this->position];
    }

    function key()
    {
        var_dump(__METHOD__);
        return $this->position;
    }

    function next()
    {
        var_dump(__METHOD__);
        ++$this->position;
    }

    function valid()
    {
        var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }
}

//$it = new MyIterator();
//
//foreach ($it as $key => $value) {
//    var_dump($key, $value);
//    echo "<br>";
//}