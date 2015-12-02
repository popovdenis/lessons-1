<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 23.10.2015
 * Time: 23:33
 */
include_once "subscribe.php";
if(isset($_POST['email']) && !empty($_POST['email'])) {
    $email = strip_tags(trim($_POST['email']));
    $subscriber = new Subscriber();
    $subscriber->saveSubscriber($email);
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="application/javascript" src="jquery-2.1.4.min.js"></script>
    <script type="application/javascript" src="subsription.js"></script>
</head>
<body>
    <form id="subscription" method="post" action="subscribe.php" enctype="multipart/form-data">
        <input type="text" name="email" size="30">
<!--        <input type="submit" name="submit" value="Subscribe">-->
        <input id="subscribe" type="button" name="button" value="Subscribe">
        <p id="subscribe-response"></p>
    </form>
</body>
</html>
