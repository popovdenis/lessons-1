<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['age'])) {
        $name = strip_tags($_POST["name"]);
        $age = strip_tags($_POST["age"]) * 1;

        $_SESSION['name'] = $name;
        $_SESSION['age'] = $age;

        echo "Ваше имя и возраст успешно внесены!";
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Демо сессии</title>
</head>
<body>
    <h1>Демонстрация сессии</h1>
    <a href="session-2.php">Демо сессии</a><br />
    <a href="session-destroy.php">Закрыть сессию</a><br /><br />

    <form action="session-1.php" method="post">
        <label>Ваше имя:
            <input name="name" value="">
        </label>
        <br />
        <label>Ваш возраст:
            <input name="age" value="">
        </label>
        <br />
        <input type="submit" value="Отправить">
    </form>
</body>
</html>