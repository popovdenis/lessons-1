<?php
include_once "Subscriber.php";
include_once "Database.php";
include_once "Controller.php";

class Subscription extends Controller
{
    /**
     * @var Subscriber
     */
    private $subscriber;

    private function isExistSubcriber()
    {
        $email = $this->getSubscriber()->getEmail();

        $sql = "SELECT sb.email FROM subscription sbs
            INNER JOIN subscriber sb on sb.id = sbs.subscriber_id
            WHERE sb.email = '" . $this->database->escape($email) . "';";

        $this->database->execute($sql);
        $subscriberEmail = $this->database->fetchAll();

        return !empty($subscriberEmail);
    }

    public function setSubscriber(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function getSubscriber()
    {
        return $this->subscriber;
    }

    public function saveSubscription()
    {
        //check subscriber
        if (!$this->isExistSubcriber()) {
            $subscriber_id = (int)$this->getSubscriber()->getId();

            $sql = "INSERT INTO subscription (`subscriber_id`) VALUE
            ('" . $this->database->escape($subscriber_id) . "');";
            $this->database->execute($sql);

            return true;
        }
        return false;
    }
}