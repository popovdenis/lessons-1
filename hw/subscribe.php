<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 23.10.2015
 * Time: 23:54
 */
class Subscriber
{
    function validateEmail($mail)
    {
        $isValid = false;

//        return preg_match("^[_\.0-9a-z-]+@([0-9a-z][-0-9a-z\.]+)\.([a-z]{2,3,4}$)", $mail);

        if (preg_match("^[_\.0-9a-z-]+@([0-9a-z][-0-9a-z\.]+)\.([a-z]{2,3,4}$)", $mail)) {
            $isValid = true;
        }

        return $isValid;
    }

    public function saveSubscriber($email)
    {
        // validate email
        // find email
    }
}

if (!empty($_POST)) {
    echo json_encode(['success' => true]);
}