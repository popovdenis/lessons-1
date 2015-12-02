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
$title = $titlepage = "Гостевая книга $version";
$helppage
        = 'Здесь вы можете осуществлять модерирование гостевой книги: удалять из списка отображаемых на сайте (скрывать), отвечать на сообщения под именем администратора. Если Вы хотите скрыть какое-либо сообщение, то нужно нажать на ссылку "<b>Скрыть</b>", расположенную под удаляемым сообщением. Для того, чтобы поместить свой комментарий на сообщение нужно нажать на ссылку "<b>Ответить</b>" в том сообщении, на которое Вы отвечаете. При этом на сайте Ваш ответ будет выделен красным цветом. ';
// Выводим шапку страницы
include "topadmin.php";
// Воспроизводим гостевую книгу, таким образом, как она выглядит на
// главной странице, но отображаем так же невидимые сообщения
// Стартовая точка
$start = $_GET["start"];
if (empty($start)) {
    $start = 0;
}
if ($start < 0) {
    $start = 0;
}
// Запрашиваем общее число сообщений
$tot = mysqli_query("SELECT count(*) FROM guest;");
// Запрашиваем сами сообщения
$gst = mysqli_query("SELECT * FROM guest ORDER BY puttime DESC LIMIT $start, $pnumber;");
if (!$gst || !$tot) {
    puterror("Ошибка при обращении к гостевой книге");
}
// При помощи цикла выбираем из базы данных
// сообщения
while ($guest = mysqli_fetch_array($gst)) {
    // Если пункт сообщение отмечено как невидимый (hide=0), выводим
    // ссылку "отобразить", если как видимый (hide=1) - "скрыть"
    $tableheader = "class=tableheader";
    if ($guest['hide'] == 'show') {
        $showhide = "<a class='menu' href=hide.php?id_msg=" . $guest['id_msg']
                . "&start=$start title='Скрыть сообщение из списка выводимых на сайте'>Скрыть сообщение</a>";
    } else {
        $showhide = "<a class='menu' href=show.php?id_msg=" . $guest['id_msg']
                . "&start=$start title='Включить отображение сообщения на сайте'>Отобразить сообщение</a>";
        $tableheader = "class=tableheaderhide";
    }
    // Выводим таблицу с сообщением
    ?>
    <p>
    <table class=bodytable width="100%" border="1" cellpadding=5 cellspacing=0 bordercolorlight=gray bordercolordark=white>
    <tr <? echo $tableheader ?> >
        <td><p class=help>Автор сообщения</td>
        <td width="100"><p class=help>Дата отправки</td>
        <td><p class=help>Город</td>
        <td><p class=help>E-mail</td>
        <td><p class=help>Url</td>
    </tr>
    <?
    echo "<tr><td><p class=zag2>" . $guest['name'] . "</td>";
    echo "<td><p class=help>" . $guest['puttime'] . "</td>";
    echo "<td><p class=help>&nbsp;" . $guest['city'] . "</td>";
    echo "<td><p class=help>&nbsp;" . $guest['email'] . "</td>";
    echo "<td><p class=help>&nbsp;" . $guest['url'] . "</td></tr>";
    echo "<tr valign=top><td><p class=zag2>Сообщение:</td><td colspan=5><p>" . $guest['msg'] . "</td></tr>";
    echo "<tr><td><p class=zag2>Администратор:</td><td colspan=5><p>" . $guest['answer'] . "</td></tr>";
    echo "</table>";
    // Ссылка на редактирование и ответ
    echo "<p class='menu'><a class='menu' href=editcommentform.php?id_msg=" . $guest['id_msg']
            . "&start=$start title='Редактировать сообщение'>Редактировать</a>";
    // Ссылка на правку сообщений
    echo "&nbsp;&nbsp;" . $showhide;
    // Ссылка на удаление сообщений
    echo "&nbsp;&nbsp;<a class='menu' href=delpost.php?id_msg=" . $guest['id_msg']
            . "&start=$start title='Удалить сообщение'>Удалить сообщение</a>";
    echo "</p>";
}
// Выводим ссылки на предыдущие и следующие сообщения
$total = mysqli_fetch_array($tot);
$count = $total['count(*)'];
if ($start > 0) {
    print " <p><A href=index.php?start=" . ($start - $pnumber) . ">Предыдущие сообщения</A> ";
}
if ($count > $start + $pnumber) {
    print " <p><A href=index.php?start=" . ($start + $pnumber) . ">Следующие сообщения</A> \n";
}
?>
    <br><br>
<?
echo "<p>Если у вас не работает это Web-приложение, вы всегда можете найти помощь по его установке и настройке на нашем форуме <a href=http://www.softtime.ru/forum/>http://www.softtime.ru/forum/</a> Возможно вам также потребуется дополнительная функциональность, в этом случае Вы также можете посетить наш форум и выссказать свои предложения. Если Ваше предложение действительно актуально и интересно, мы доработаем приложение с учетом Ваших пожеланий.</p>";
//include "bottomadmin.php";
