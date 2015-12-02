<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 13.10.2015
 * Time: 23:24
 */
class DB
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $database = 'mydb';
    private $port = 3306;

    /**
     * @var mysqli
     */
    private $connection_id;

    /**
     * @var mysqli_result
     */
    private $resource_id;


    private $result_array = array();

    public function __construct()
    {
        $this->db_connect();
    }

    private function db_connect()
    {
        $mysqli = mysqli_init();

        if ($mysqli->real_connect($this->hostname, $this->username, $this->password, $this->database, $this->port))
        {
            $this->connection_id = $mysqli;

            return true;
        }

        return false;
    }

    private function close_connection()
    {
        $this->connection_id->close();
    }

    public function query($query)
    {
        $this->resource_id = $this->connection_id->query($query);
    }

    public function fetch_accoc()
    {
        while ($row = $this->resource_id->fetch_assoc())
        {
            $this->result_array[] = $row;
        }

        return $this->result_array;
    }

    public function fetch_row()
    {
        return $this->resource_id->fetch_row();
    }

    public function __destruct()
    {
        $this->close_connection();
    }
}