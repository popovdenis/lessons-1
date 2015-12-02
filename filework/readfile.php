<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Пример readfile</title>
</head>
<body>
<?php
// все выводится с переводами строк \r\n
//    $myFile = fopen('data.txt', 'r') or die('Не могу открыть файл');
//    echo fread($myFile, 5);
//    fclose($myFile);
// или
    readfile('data.txt');
?>
</body>
</html>