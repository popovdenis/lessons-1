<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Пример fgets</title>
</head>
<body>
<?php
if ($myFile = fopen('data.txt', 'r')) {
    $lines = array();

    while($myLine = fgets($myFile)) {
        $lines[] = $myLine;
    }

    fclose($myFile);
    echo '<pre>';
    print_r($lines);
    echo '</pre>';
}
?>
</body>
</html>
