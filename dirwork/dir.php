<?php
// текущая директория
$dir = opendir('../');

// перебираем все в текущей директории
while ($name = readdir($dir)) {
    if ($name == '.' or $name == '..') {
        continue;
    }
    if (is_dir($name)) {
        echo '<b>[' . $name . ']</b><br />';
    } else {
        echo $name . "<br />";
    }
}

// закрыли директорию
closedir($dir);