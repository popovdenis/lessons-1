<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Пример fputs</title>
</head>
<body>
<?php
//if ($myFile = fopen('data.txt', 'a+')) {
//    fputs($myFile, "\nLine sixth");
//    fclose($myFile);
//}
// W
file_put_contents('data.txt', '\nLine sixth');
//file_put_contents('data.txt', '\nLine sixth', FILE_APPEND);
?>
</body>
</html>
