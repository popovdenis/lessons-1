<html>
<head>
    <title>Гостевая книга</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--    <link rel="StyleSheet" type="text/css" href="guestbook.css">-->
</head>
<body>
<table border="0" cellspacing="0" width="100%" cellpadding="0">
    <tr>
        <td height="35">
            <p class="pcolor1">
                <b>Гостевая книга</b>
            </p>
        </td>
    </tr>
</table>
<table align="right" cellpadding="0" cellspacing="10">
    <tr align="right">
        <td>
            <a class=link href="addrec.php" title="">Написать сообщение</a>
        </td>
        <td width="20%">&nbsp;</td>
    </tr>
</table>
<br><br><br>
<table width="85%" border="0">
    <tr>
        <td>
<?php
    // Осуществляем соединение с базой данных
    include "config.php";
    // Извлекаем из строки запроса параметр start
    if (isset($_GET['start'])) {
        $start = $_GET['start'];
    } else {
        $start = "";
    }
    // Стартовая точка
    if (empty($start)) {
        $start = 0;
    }
    $start = intval($start);
    if ($start < 0) {
        $start = 0;
    }
    // Запрашиваем общее число отображаемых сообщейний
    $query = "SELECT count(*) FROM guest WHERE hide = 'show'";
    $tot = mysqli_query($dbcnx, $query);
    // Запрашиваем сами сообщения
    $query = "SELECT * FROM guest WHERE hide = 'show' ORDER BY puttime DESC LIMIT $start, $pnumber";

    $thm = mysqli_query($dbcnx, $query);

    if (!$tot || !$thm) {
        puterror("Ошибка при выборке сообщений...");
    }
    // Общее число отображаемых сообщений
    $count = mysqli_fetch_array($tot);

    // Выводим ссылки на предыдущие и следующие сообщения
    if ($start > 0) {
?>
    <<<
    <a class=link href=index.php?start=<?php echo ($start - $pnumber) ?>>Предыдущие</a>
<?php
    }
    if ($count > $start + $pnumber) {
?>
    <a class=link href=index.php?start=<?php echo ($start + $pnumber)?>>Следующие</a>
    >>>
<?php
    }
    while ($themes = mysqli_fetch_array($thm)) {
        $name = trim($themes['name']);
        $city = trim($themes['city']);
        $email = trim($themes['email']);
        $url = trim($themes['url']);
        $msg = trim($themes['msg']);
        $answer = trim($themes['answer']);
?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#F8F8F8">
            <td rowspan="1" height="20">
                <nobr>
                    <p class=ptdg>
                        <b><?php echo $name ?></b>&nbsp;
                    <?php if (!empty($city)) {
                        print "($city)";
                    } ?>
                </nobr>
            </td>
            <td width="100%" valign="bottom" align="right">
                <nobr><p class=help>от: <b><?php print $themes['puttime']; ?></b></nobr>
            </td>
        </tr>
        <tr>
            <td></td>
            <td bgcolor="gray" height="1">
                <img src="images/pic.gif" border="0" width="1" height="1" alt="">
            </td>
        </tr>
        <tr valign="top">
            <td rowspan="2" colspan="2" height="25">
                <nobr>
                    <p class=ptdg>
                        <?php if (!empty($email)) {
                            print "e-mail: <a class=link href=mailto:$email>$email</a>&nbsp;&nbsp;";
                        } ?>
                    <?php if (!empty($url)) {
                        print "www: <a class=link href='$url'>$url</a>";
                    } ?>
                </nobr>
            </td>
        </tr>
        <tr>
            <td height="10">
                <nop>
            </td>
        </tr>
        <tr valign="top">
            <td colspan="2">
                <p class=ptext>
                    <?php echo $msg; ?>
                    <br>
                    <?php
                    if (!empty($answer) && $answer != "-") {
                        print "<p class=panswer>Администратор:&nbsp$answer</p>";
                    }
                    ?>
            </td>
        </tr>
    </table>
    <br><br>
<?php
    }
    print '<a class=link href=addrec.php>Написать&nbsp;сообщение</A>&nbsp;&nbsp;&nbsp;&nbsp;';
    if ($start != 0) {
        print " <img style='margin-right: 10px' src='images/arrow1.gif' border='0' width=7 height=17 align=middle><A class=link href=index.php?start="
                . ($start - $pnumber) . ">Предыдущие</A> ";
    }
    if ($count > $start + $pnumber) {
        print " <A class=link href=index.php?start=" . ($start + $pnumber)
                . ">Следующие</A><img style='margin-left: 10px' src='images/arrow2.gif' border=0 width=7 height=17 align=middle> \n";
    }
    if ($count > $start + $pnumber) {
        $count = $start + $pnumber;
    }
?>
        </td>
    </tr>
</table>
</body>
</html>
