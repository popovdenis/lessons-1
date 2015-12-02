<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$_SESSION['randStr']) {
        $result = 'Tune graphics';
    } else {
        if ($_SESSION['randStr'] == $_POST['captcha']) {
            $result = 'Good!';
        } else {
            $result = 'Bad!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="" method="post">
    <div>
        <img src="captcha.php">
    </div>
    <div>
        <label>Введите строку</label>
        <input type="text" name="captcha" size="10">
    </div>
    <input type="submit" value="Register">
</form>
<?php echo $result; ?>
</body>
</html>