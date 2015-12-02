<?php
include_once("db_functions.php");

if (isset($_POST['username']) && !empty($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $user = getUser($email);
    if (empty($user)) {
        $result = saveUser($username,$password, $email, $phone);
        if (is_bool($result)) {
            echo "Вы успешно зарегистрированы!";
        } else {
            echo $result;
        }
    } else {
        echo "Вы уже зарегистрированы!";
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>
<p><a href="index.php">Back to site</a></p>
<form name="registration" action="registration.php" method="post">
    <label>User name:
        <input type="text" name="username" value="">
    </label><br /><br />
    <label>Email:
        <input type="text" name="email" value="">
    </label><br /><br />
    <label>Phone:
        <input type="text" name="phone" value="">
    </label><br /><br />
    <label>Password:
        <input type="password" name="password" value="">
    </label><br /><br />
    <input type="submit" value="Register">
</form>
</body>
</html>