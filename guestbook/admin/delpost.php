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
// Формируем SQL-запрос
$query = "DELETE FROM guest
            WHERE id_msg=".$_GET["id_msg"];
// Удаляем сообщение с первичным ключом $id_msg
if(mysql_query($query))
{
    // После удачного удаления сообщения переходим к
    // дальнейшему администрированию гостевой книги
    print "<HTML><HEAD>\n";
    print "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?start=".$_GET["start"]."'>\n";
    print "</HEAD></HTML>\n";
}
// В случае неудачи выводим сообщение об ошибке
else puterror("Ошибка при обращении к гостевой книге");
?>
