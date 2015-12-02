<?php
session_start();

$result = 0; // Переменная для суммы ответов
if (isset($_SESSION['answers'])) {
    $answersCorrect = parse_ini_file('answers.ini');
    $answersUser = $_SESSION['answers'];
    // проходим по ответам и смотрим, есть ли среди них правильные
    foreach ($answersUser as $value) {
        if (array_key_exists($value, $answersCorrect)) {
            // суммируем правильные ответы
            $result ++;
        }
    }
    // очищаем данные сессии
    session_destroy();
}
?>
<table>
    <tr>
        <td>
            <p>Ваш результат: <?php echo $result ?> из 5</p>
        </td>
    </tr>
</table>