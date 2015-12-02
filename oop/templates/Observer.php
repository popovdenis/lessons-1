<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 31.10.2015
 * Time: 3:07
 */
// Обработчик событий для классов
interface eventHandler
{
    function reaction($obj);
}

class DriversGroup
{
    static private $instance = null;
    private        $drivers  = array(); //члены банды
    private        $timeCall; //Дата следующего ограбления

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    // получить единственный екземпляр этого класса
    static public function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DriversGroup();
        }
        return self::$instance;
    }

    public function getTimeCall()
    {
        return $this->timeCall;
    }

    public function setTimeCall($time)
    {
        $this->timeCall = $time;

        $this->notifyDrivers();
    }

    public function getToDriversGroup($drivers)
    {
        $this->drivers[] = $drivers;
    }

    function notifyDrivers()
    {
        foreach ($this->drivers as $driver) {
            $driver->reaction($this);
        }
    }
}

class Passenger implements eventHandler
{
    private $name = "";

    public function __construct($name)
    {
        $this->name = $name;

        DriversGroup::getInstance()->getToDriversGroup($this);
    }

    public function reaction($obj)
    {
        if ($obj instanceof DriversGroup) {
            print "<br/>A new passenger " . $this->name . ": " . $obj->getTimeCall();
        }
    }
}

class Dispatcher implements eventHandler
{
    private $name = "";

    public function __construct($name)
    {
        $this->name = $name;

        DriversGroup::getInstance()->getToDriversGroup($this);
    }

    public function reaction($obj)
    {
        if ($obj instanceof DriversGroup) {
            // Обновить информацию.
            print "<br/>Attantion to all drivers! <strong>" .
                $obj->gettimeCall() . "</strong> Who can get a new passenger</u>? <br >";
        }
    }

}

$scully = new Passenger('Kate');
$malder = new Passenger('Jack');
$dispatcher = new Dispatcher('Jessica');
DriversGroup::getInstance()->setTimeCall(date("d-m-Y H:i"));

$malder = new Passenger('Jack');
$dispatcher = new Dispatcher('Jessica');
DriversGroup::getInstance()->setTimeCall(date("d-m-Y H:i"));