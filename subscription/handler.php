<?php
include_once "Subscriber.php";
include_once "Subscription.php";

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $subscriber = new Subscriber();
    $subscriber->setEmail($_POST['email']);
    $subscriber->saveSubscriber();

    $subscription = new Subscription();
    $subscription->setSubscriber($subscriber);
    $response = array(
        'success' => false,
        'subscriber' => array()
    );
    if ($subscription->saveSubscription()) {
        $response['success'] = true;
        $response['subscriber'] = $subscriber->getSubscriber(
            $subscriber->getId()
        );
    }

    echo json_encode($response);
}