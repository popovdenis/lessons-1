<?php

/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 31.10.2015
 * Time: 3:18
 */
interface OutputInterface
{
    public function load($arrayOfData);
}

/**
 * Class SerializedArrayOutput
 *
 * It can be easily add new output types without affecting the client code
 */
class SerializedArrayOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return serialize($arrayOfData);
    }
}

class JsonStringOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return json_encode($arrayOfData);
    }
}

class ArrayOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return $arrayOfData;
    }
}

$array = [1, 2, 3, 4, 5];
$res[] = (new SerializedArrayOutput())->load($array);
$res[] = (new JsonStringOutput())->load($array);
$res[] = (new ArrayOutput())->load($array);

echo '<pre>';
var_dump($res);
echo '</pre>';