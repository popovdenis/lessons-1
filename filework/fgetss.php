<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Пример fgetss</title>
</head>
<body>
<?php
if ($myFile = fopen('data.html', 'r')) {
    $lines = array();

    while($myLine = fgetss($myFile, 1024, '<br />')) {
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
