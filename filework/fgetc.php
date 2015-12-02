<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Пример fgetc</title>
</head>
<body>
<?php
if ($myFile = fopen('data.txt', 'r')) {
    $chars = array();

    while($myCharacter = fgetc($myFile)) {
        $chars[] = $myCharacter;
    }

    fclose($myFile);
    echo '<pre>';
    print_r($chars);
    echo '</pre>';
}
?>
</body>
</html>
