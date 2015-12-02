<?php

interface EmailSubscribe
{
    public function subscribe($email);

    public function unsubscribe($email);

    public function sendUpdates();
}

class TwitterService
{
    public function authenticate($username)
    {
    }

    public function deauthenticate($username)
    {
    }

    public function tweet($message, $user)
    {
        // Update  wall with new tweet
        return 1;
    }

    public function getUpdates()
    {
        // Return Updates
        return 1;
    }

    public function getFollowers()
    {
        // Return followers
        return 1;
    }
}

class TwitterAdapter implements EmailSubscribe
{
    public function subscribe($username)
    {
    }

    public function unsubscribe($username)
    {
    }

    public function sendUpdates()
    {
        $tw_service = new TwitterService();
        $updates = $tw_service->getUpdates();
        $subscribers = $tw_service->getFollowers();
        $tw_service->tweet($updates, $subscribers);
    }
}

$twitter_subscribe = new TwitterAdapter();
$twitter_subscribe->sendUpdates();