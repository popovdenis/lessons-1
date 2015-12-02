<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 14.09.2015
 * Time: 1:15
 */
session_start();
header("Content-type: text/html; charset=utf-8");

$questions = parse_ini_file('questions.ini');
if (isset($_POST['answer'])) {
    $questionKey = (int)$_POST['q'];
    if (! isset($_SESSION['answers'])) {
        $_SESSION['answers'] = [];
    }

    $answer = strip_tags(trim($_POST['answer']));
    $_SESSION['answers'][] = $answer;
} else {
    $questionKey = 0;
}
if (! array_key_exists($questionKey, $questions)) {
    header("Location: result.php");
}
$title = $questions[$questionKey];
$questionKey++;
?>
<h3><?php echo $title; ?></h3>
<form action="quiz.php" method="post">
    <input type="hidden" name="q" value="<?php echo $questionKey; ?>">
    <input name="answer" type="text">
    <input type="submit">
</form>