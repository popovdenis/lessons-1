<?php
//define("PATH_LOG", 'log');
$time = time();
$page = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : ''; // полный путь
$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''; // откуда пришел
//$ref = $_SERVER['HTTP_REFERER']; //Опечатка? Нет! :-)
$ref = pathinfo($ref, PATHINFO_BASENAME);

//$log = [$time, $page, $ref];
//$path = serialize($log) . "\n";
$path = "$time|$page|$ref\n";
file_put_contents(PATH_LOG , $path, FILE_APPEND);
