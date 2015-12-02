<?php
include_once "DB.php";
// https://github.com/LegendOfMCPE/LoM-CMS/wiki/How-to-Install-LibYAML
class MyIDB
{
    /**
     * @var mysqli $conn_id Connection ID.
     */
    private static $db;

    /**
     * @var mysqli_result $resource_id Resource ID.
     */
    private $resource_id;

    public function __construct()
    {
        self::$db = DB::getInstance()->getConnection();
    }

    /**
     * Execute the query
     *
     * @param    string $sql an SQL query
     *
     * @return    mixed
     */
    protected function _execute($sql)
    {
        return self::$db->query($this->_prep_query($sql));
    }

    /**
     * Prep the query
     *
     * If needed, each database adapter can prep the query string
     *
     * @param    string $sql an SQL query
     *
     * @return    string
     */
    protected function _prep_query($sql)
    {
        // mysqli_affected_rows() returns 0 for "DELETE FROM TABLE" queries. This hack
        // modifies the query so that it a proper number of affected rows is returned.
        if (preg_match('/^\s*DELETE\s+FROM\s+(\S+)\s*$/i', $sql)) {
            return trim($sql) . ' WHERE 1=1';
        }

        return $sql;
    }

    /**
     * Platform-dependant string escape
     *
     * @param    string
     *
     * @return    string
     */
    protected function _escape_str($str)
    {
        return self::$db->real_escape_string($str);
    }

    /**
     * Insert ID
     *
     * @return    int
     */
    public function insert_id()
    {
        return self::$db->insert_id;
    }

    /**
     * Error
     *
     * Returns an array containing code and message of the last
     * database error that has occurred.
     *
     * @return    array
     */
    public function error()
    {
        if (!empty(self::$db->connect_errno)) {
            return array(
                'code' => self::$db->connect_errno,
                'message' => self::$db->connect_error
            );
        }
        return array('code' => self::$db->errno, 'message' => self::$db->error);
    }

    public function query($sql)
    {
        $this->resource_id = $this->_execute($sql);
    }

    public function fetch_accoc()
    {
        $result_array = array();
        while ($row = $this->resource_id->fetch_assoc())
        {
            $result_array[] = $row;
        }

        return $result_array;
    }

    public function fetch_row()
    {
        return $this->resource_id->fetch_row();
    }
}

$db = new MyIDB();
$db->query('select * from news');
$res = $db->fetch_accoc();
echo '<pre>';
print_r($res);
echo '</pre>';