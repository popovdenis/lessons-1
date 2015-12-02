<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Пример fopen</title>
</head>
<body>
<?php
// 1
// example die
// exit;
// die; //аналог
//echo "Не могу открыть файл";
//die;
// или
//die('Не могу открыть файл');
// 2
/*$myFile = fopen('data.txt', 'r') || die('Не могу открыть файл'); // error
var_dump($myFile);*/
// 3
// use data-error.txt to trigger error
// 4
$myFile = fopen('data.txt', 'r') or die('Не могу открыть файл');
echo '<div>Файл успешно открыт для чтения</div>';
fclose($myFile);
echo '<div>Файл закрыт</div>';
?>
</body>
</html>