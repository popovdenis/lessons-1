<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 14.09.2015
 * Time: 1:15
 */
header("Content-type: text/html; charset=utf-8");
if (!isset($_POST['test'])) {
    $title = 'Пройдите тест!';
} else {
    header('Location: quiz.php');
}
?>
<h3><?php echo $title; ?></h3>
<form action="index.php" method="post">
    <input type="hidden" name="test">
    <input type="submit" value="Начать тест">
</form>