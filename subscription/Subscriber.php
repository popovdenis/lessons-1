<?php
include_once "Controller.php";

class Subscriber extends Controller
{
    private $id;

    private $email;

    private function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function saveSubscriber()
    {
        $email = $this->getEmail();
        $sql = "INSERT INTO subscriber (`email`) VALUE
            ('" . $this->database->escape($email) . "');";

        $this->database->execute($sql);

        $this->setId($this->database->getInsertId());

        return true;
    }

    public function getSubscribers($options = array())
    {
        $sql = "SELECT sb.id, sb.email FROM subscriber sb
            INNER JOIN subscription sbs ON sb.id = sbs.subscriber_id
           ;";

        $this->database->execute($sql);
        return $this->database->fetchAll();
    }

    public function getSubscriber($id)
    {
        $sql = "SELECT sb.id, sb.email FROM subscriber sb
            INNER JOIN subscription sbs ON sb.id = sbs.subscriber_id
            WHERE sb.id = '" . $this->database->escape($id) . "';";

        $this->database->execute($sql);

        return $this->database->fetchRow();
    }
}