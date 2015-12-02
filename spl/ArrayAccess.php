<?php

/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 29.10.2015
 * Time: 22:53
 */
class User implements ArrayAccess
{
    /**
     * Data
     *
     * @var array
     * @access private
     */
    private $data = [];

    /**
     * Get a data by key
     *
     * @param string $key The key data to retrieve
     *
     * @access public
     */
    public function __get($key)
    {
        return $this->data[$key];
    }

    /**
     * Assigns a value to the specified data
     *
     * @param string $key The data key to assign the value to
     * @param mixed  $value The value to set
     *
     * @access public
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * Whether or not an data exists by key
     *
     * @param string $key An data key to check for
     *
     * @access      public
     * @return boolean
     * @abstracting ArrayAccess
     */
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * Unsets an data by key
     *
     * @param string $key The key to unset
     *
     * @access public
     */
    public function __unset($key)
    {
        unset($this->data[$key]);
    }

    /**
     * Assigns a value to the specified offset
     *
     * @param string $offset The offset to assign the value to
     * @param mixed $value The value to set
     *
     * @access      public
     * @abstracting ArrayAccess
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * Whether or not an offset exists
     *
     * @param string $offset An offset to check for
     *
     * @access      public
     * @return boolean
     * @abstracting ArrayAccess
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * Unsets an offset
     *
     * @param string $offset The offset to unset
     *
     * @access      public
     * @abstracting ArrayAccess
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->data[$offset]);
        }
    }

    /**
     * Returns the value at specified offset
     *
     * @param string $offset The offset to retrieve
     *
     * @access      public
     * @return mixed
     * @abstracting ArrayAccess
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }
}

$foo = new User();
// Set data as array and object
$foo->firstname = 'Kate';
$foo->lastname = 'Ross';
// Call as object
echo 'firstname as object '.$foo->firstname."<br>";
// Call as array
echo 'lastname as array '.$foo['lastname']."<br>";
// Reset as array
$foo['firstname'] = 'Jennise';
echo $foo['firstname']."<br>";