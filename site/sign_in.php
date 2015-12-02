<?php
include_once ("db_functions.php");

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty(getUser($email, $password))) {
        echo "Вы не зарегистрированы!";
    } else {
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Sign in</title>
</head>
<body>
<p><a href="index.php">Back to site</a></p>
<form name="sign_in" action="sign_in.php" method="post">
    <label>Email:
        <input type="text" name="email">
    </label><br /><br />
    <label>Password:
        <input type="password" name="password">
    </label><br /><br />
    <input type="submit" value="Sign in">
</form>
</body>
</html>