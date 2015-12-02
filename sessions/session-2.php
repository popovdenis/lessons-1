<?php
session_start();

$name = $_SESSION['name'];
$age = $_SESSION['age'];

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Демо сессии</title>
</head>
<body>
    <h1>Демонстрация сессии</h1>
    <a href="session-1.php">Демо сессии</a><br />
    <a href="session-destroy.php">Закрыть сессию</a><br /><br />
<?php
    if ($name and $age) {
        echo "<h1>Привет, $name</h1>";
        echo "<h3>Тебе, $age лет</h3>";
    } else {
        print "<h3>Заполнить все поля.</h3>";
    }
?>
</body>
</html>