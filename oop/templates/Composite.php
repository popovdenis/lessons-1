<?php
/**
 * Class ComponentException
 */
class ComponentException extends Exception {}

abstract class Component
{
    protected $_children = array();

    abstract public function add(Component $Component);

    abstract public function remove($index);

    abstract public function getChild($index);

    abstract public function getChildren();

    abstract public function operation();
}

class Composite extends Component
{
    public function add(Component $Component)
    {
        $this->_children[] = $Component;

        return $this;
    }

    public function getChildren()
    {
        return $this->_children;
    }

    public function getChild($index)
    {
        if (!isset($this->_children[$index])) {
            throw new ComponentException("Child not exists");
        }

        return $this->_children[$index];
    }

    public function operation()
    {
        print "I am composite. I have " . count($this->getChildren()) . " children <br>";

        foreach ($this->getChildren() as $Child) {
            $Child->operation();
        }
    }

    public function remove($index)
    {
        if (!isset($this->_children[$index])) {
            throw new ComponentException("Child not exists");
        }

        unset($this->_children[$index]);
    }
}

class Leaf extends Component
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function add(Component $Component)
    {
        throw new ComponentException("I can't append child to myself");
    }

    public function getChild($index)
    {
        throw new ComponentException("Child not exists");
    }

    public function operation()
    {
        print "I am leaf '{$this->name}' <br >";
    }

    public function remove($index)
    {
        throw new ComponentException("Child not exists");
    }

    public function getChildren()
    {
        return array();
    }
}

$composite = new Composite();
$composite->add(new Leaf('First'));
$composite->add(new Leaf('Second'));
$composite->add(new Leaf('Third'));
$composite->add(new Leaf('Fourth'));
$composite->add(new Leaf('Fifth'));
$composite->operation();
