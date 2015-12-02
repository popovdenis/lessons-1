<?php

interface IPizza {
    public function prepare();
    public function bake();
    public function cut();
    public function box();
}

// 1. Открыли пиццерию
class Pizza implements IPizza
{
    public function prepare()
    {
        echo "Preparing... <br>";
    }

    public function bake()
    {
        echo "Bake for 25 minutes at350... <br>";
    }

    public function cut()
    {
        echo "Cutting the pizza into diagonal slices... <br >";
    }

    public function box()
    {
        echo 'Place pizza in official PizzaStore box!';
    }
}
// 2. Разновидности
class CheezePizza extends Pizza {}
class GreekPizza extends Pizza {}
class PepperoniPizza extends Pizza {}

// 5.
class ClamPizza extends Pizza {}
class VeggiePizza extends Pizza {}

// 6.
class SimplePizzaFactory
{
    public function createPizza($type)
    {
        $pizza = null;
        if ($type == 'cheese') {
            $pizza = new CheezePizza();
        } elseif ($type == 'greek') {
            $pizza = new GreekPizza();
        } elseif ($type == 'pepperoni') {
            $pizza = new PepperoniPizza();
        } elseif ($type == 'clam') {
            $pizza = new ClamPizza();
        } elseif ($type == 'veggie') {
            $pizza = new VeggiePizza();
        }

        return $pizza;
    }
}

// 8.
abstract class PizzaStore
{
    public function orderPizza($type)
    {
        /**
         * @var $pizza Pizza
         */
        $pizza = $this->createPizza($type);

        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();

        return $pizza;
    }

    abstract public function createPizza($type);
}

class NYStyleCheesePizza extends CheezePizza {}
class NYStyleGreekPizza extends GreekPizza {}
class NYStylePepperoniPizza extends PepperoniPizza {}
class NYStyleClamPizza extends ClamPizza {}
class NYStyleVeggiePizza extends VeggiePizza {}

class NYPizzaStore extends PizzaStore
{
    public function createPizza($type)
    {
        $pizza = null;
        if ($type == 'cheese') {
            $pizza = new NYStyleCheesePizza();
        } elseif ($type == 'greek') {
            $pizza = new NYStyleGreekPizza();
        } elseif ($type == 'pepperoni') {
            $pizza = new NYStylePepperoniPizza();
        } elseif ($type == 'clam') {
            $pizza = new NYStyleClamPizza();
        } elseif ($type == 'veggie') {
            $pizza = new NYStyleVeggiePizza();
        }

        return $pizza;
    }
}

class NYPizzaFactory extends SimplePizzaFactory {}
class ChicagoPizzaFactory extends SimplePizzaFactory {}

$nyStore = new NYPizzaStore();
$pizza = $nyStore->orderPizza('veggie');

//$chicagoStore = new ChicagoPizzaStore();
//$pizza = $chicagoStore->orderPizza('veggie');