<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Пример fpassthru</title>
</head>
<body>
<?php
// все выводится с переводами строк \r\n
$myFile = fopen('data.txt', 'r') or die('Не могу открыть файл');
echo fread($myFile, 5);

//echo fread($myFile, 1024);
//// или
//fpassthru($myFile);

    fclose($myFile);
?>
</body>
</html>