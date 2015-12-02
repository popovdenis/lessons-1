<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Пример fwrite</title>
</head>
<body>
<?php
if ($myFile = fopen('data2.txt', 'w')) {
    fwrite($myFile, 1);
    fwrite($myFile, "\nLine next");

    fclose($myFile);

    echo "Данные в файл записаны!";
}
?>
</body>
</html>