<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Пример readfile</title>
</head>
<body>
<?php
//if ($myFile = fopen('data.txt', 'r')) {
//    $lines = array();
//
//    while(!feof($myFile)) {
//        $lines[] = fgets($myFile);
//    }
//
//    fclose($myFile);
//    echo '<pre>';
//    print_r($lines);
//    echo '</pre>';
//}
// или
echo '<pre>';
    print_r(file('data.txt'));
echo '</pre>';
?>
</body>
</html>