<?php
include_once "DB.php";

class User
{
    public $firstname;

    public $lastname;

    public $password;

    public $email;

    public $phone;

    public $createdAt;

    /**
     * @var DB
     */
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getUser()
    {
        $sql = "SELECT id, firstname, lastname, password, email, phone, created_at FROM users";
        $this->db->query($sql);
        $users = $this->db->fetch_accoc();
        echo '<pre>';
        print_r($users);
        echo '</pre>';
    }

    public function getUsers()
    {
        $sql = "SELECT id, firstname, lastname, password, email, phone, created_at FROM users";

    }

    public function postUser()
    {}

    public function putUser()
    {}

    public function deleteUser()
    {}
}