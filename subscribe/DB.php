<?php

// https://github.com/LegendOfMCPE/LoM-CMS/wiki/How-to-Install-LibYAML
class DB
{
    /**
     * @var mysqli $conn_id Connection ID.
     */
    private $conn_id;

    private static $instance; //The single instance

    /*
     * Get an instance of the Database
     *
     * @return DB
    */
    public static function getInstance() {
        if(!self::$instance) { // If no instance then make one
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Constructor
    private function __construct()
    {
        $parameters = $this->get_config();
        $mysqli = mysqli_init();
        $mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 10);

        try {
            if ($mysqli->real_connect(
                $parameters['database_host'],
                $parameters['database_user'],
                $parameters['database_password'],
                null,
                $parameters['database_port']
            )
            ) {
                if (!$mysqli->select_db($parameters['database_name'])) {
                    throw new Exception('Database is not allowed');
                }
            }

            $this->conn_id = $mysqli;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    private function get_config()
    {
//        phpinfo();
        if (file_exists('config.yml')) {
            $stream = yaml_parse_file('config.yml');
            if (!empty($stream)) {
                return $stream['parameters'];
            }
        }

        return null;
    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone() {}

    // Get mysqli connection
    public function getConnection() {
        return $this->conn_id;
    }

    /**
     * Reconnect
     *
     * @return    void
     */
    public function reconnect()
    {
        if ($this->conn_id !== false && $this->conn_id->ping() === false) {
            $this->conn_id = false;
        }
    }

    /**
     * Set client character set
     *
     * @param    string $charset
     *
     * @return    bool
     */
    protected function _db_set_charset($charset)
    {
        return $this->conn_id->set_charset($charset);
    }

    /**
     * Close DB Connection
     *
     * @return    void
     */
    protected function _close()
    {
        $this->conn_id->close();
    }
}