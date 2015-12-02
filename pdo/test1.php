<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=samp_db', 'root', 'root');
    $rows = $db->exec(
        "CREATE TABLE `testing`(
        id INT PRIMARY KEY AUTO_INCREMENT,
        fname VARCHAR(20) NOT NULL DEFAULT '',
        email VARCHAR(50) NOT NULL DEFAULT '')"
    );
    echo '<pre>';
    var_dump($rows);
    echo '</pre>';
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}