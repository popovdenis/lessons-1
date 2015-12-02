<?php
$dblocation = "localhost";
$dbname = "guestbook";
$dbuser = "root";
$dbpasswd = "root";
$pnumber = 10;
$sendmail = false;
$valmail = "mymail@mail.ru";
$version = "1.2.1";

$dbcnx = mysqli_connect($dblocation, $dbuser, $dbpasswd);
if (!$dbcnx) {
    echo("<p>Server is not available.</p>");
    exit();
}
// Выбираем базу данных
if (!mysqli_select_db($dbcnx, $dbname)) {
    echo("<p>Database is not available.</p>");
    exit();
}

function puterror($message)
{
    echo("<p>$message</p>");
    exit();
}
