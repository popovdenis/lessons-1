<?php
include_once "MyiDB.php";

class Database
{
    /**
     * @var mysqli
     */
    public static $db;
    /**
     * @var mysqli_result
     */
    public $result;

    public function __construct()
    {
        self::$db = MyiDB::getInstance()->getConnection();
    }

    public function getInsertId()
    {
        return self::$db->insert_id;
    }

    public function execute($sql)
    {
        $this->result = self::$db->query($sql);
    }

    public function fetchAll()
    {
      return $this->result->fetch_all();
    }

    public function fetchRow()
    {
        return $this->result->fetch_assoc();
    }

    public function escape($value)
    {
        return
            self::$db->real_escape_string(
                trim(
                    strip_tags($value)
                )
            );
    }
}