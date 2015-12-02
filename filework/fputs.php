<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Пример fputs</title>
</head>
<body>
<?php
if ($myFile = fopen('data.txt', 'a+')) {
    fputs($myFile, "\nLine sixth");

    fclose($myFile);
}
?>
</body>
</html>
