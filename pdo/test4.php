<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 02.11.2015
 * Time: 23:59
 */
$sth3 = $db->prepare("SELECT * FROM `testing` WHERE id=:id");
$sth3->bindParam(':id', $id);

for ($id = 1; $id < 4; $id++) {
    $sth3->execute();

    while ($row = $sth3->fetch()) {
        echo '<pre>';
        var_dump($row);
        echo '</pre>';
    }
}