<?php
///////////////////////////////////////////////////
// Гостевая книга с использованием MySQL
// 2003-2004 (C) IT-студия SoftTime (http://www.softtime.ru)
// Симдянов И.В. (simdyanov@softtime.ru)
// Кузнецов М.В. (kuznetsov@softtime.ru)
// Голышев С.В. (softtime@softtime.ru)
///////////////////////////////////////////////////
// Получаем соединение с базой данных
include "../config.php";
// Добавляем ответ модератора на сообщение с первичным ключом $id_msg
$query = "UPDATE guest SET answer = '".$_POST["answer"]."',
                             msg = '".$_POST["msg"]."'
           WHERE id_msg=".$_POST["id_msg"];
if(mysql_query($query))
{
    // После удачного добавления переходим к
    // дальнейшему администрированию гостевой книги
    print "<HTML><HEAD>\n";
    print "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?start=".$_POST["start"]."'>\n";
    print "</HEAD></HTML>\n";
}
// В случае неудачи выводим сообщение об ошибке
else puterror("Ошибка при обращении к гостевой книге");
?>
