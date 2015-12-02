<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=source_it_project', 'root', 'root');
    $sth1 = $db->prepare("SELECT * FROM `question`");
    $sth1->execute();
    $questions = $sth1->fetchAll();

    $sth2 = $db->prepare("SELECT * FROM `answer`");
    $sth2->execute();
    $answers = $sth2->fetchAll();

    $index = 0;
    $question = 0;
    foreach ($answers as $answer) {
        $query = "INSERT INTO question_answer (`question_id`,`answer_id`)
            VALUES (:question_id, :answer_id)";
        $sth3 = $db->prepare($query);
        $sth3->bindValue(':question_id', $questions[$question]['id'], PDO::PARAM_INT);
        $sth3->bindValue(':answer_id', $answer['id'], PDO::PARAM_INT);
        $sth3->execute();

        $index++;
        if ($index % 4 == 0) {
            $question++;
        }
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}