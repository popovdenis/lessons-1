<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
</head>
<body bottommargin="0" marginheight="0" marginwidth="0" rightmargin="0" leftmargin="0" topmargin="0">
<table border="0" cellspacing="0" width="100%" cellpadding="0">
    <tr>
        <td colspan="3" height="35"><p class="pcolor1"><nobr><b>�������� �����</nobr></b></p></td>
        <td width="100%" colspan="2"><nop></td>
    </tr>
    <tr align="center">
        <td width="150" colspan="2"><nop></td>
        <td height="4" bgcolor="#EAEAEA"><nop></td>
        <td bgcolor="silver"><nop></td>
        <td bgcolor="gray"><nop></td>
    </tr>
</table>
<table width="100%">
    <tr align="right">
        <td>
            <a class=link href="index.php" title="��������� � �������� �����">�������� �����</a>&nbsp;&nbsp;
            <a class=link href="http://www.softtime.ru" title="��������� �� ����">�������</a>
        </td>
        <td width="10%">&nbsp;</td>
    </tr>
</table>
<form action="write_message.php" method=post>
    <input type=hidden name=sid_add_theme value='<?php echo $sid_add_theme; ?>'>
    <input type=hidden name=action value=post>
    <table><tr valign="top"><td width="25%">&nbsp;</td><td>
                <table border="0" align="center" cellpadding="6" cellspacing="0">
                    <tr valign="top">
                        <td colspan="3" height="60">
                            <p class="pcolor2"><b>���������� ���������</b>
                        </td>
                    </tr>
                    <tr>
                        <td width="50"><p class=ptd><b><em class=em>��� *</em></b></td>
                        <td><input type=text name=name maxlength=32 size=25 value='<?php echo $name; ?>'></td>
                        <td rowspan="3" width="120">
                            <p class=help>* ������� ������ �������� ����, ������������ ��� ����������
                        </td>
                    </tr>
                    <tr>
                        <td><p class=ptd><b>&nbsp;&nbsp;&nbsp;�����</b></td>
                        <td><input type=text name=city maxlength=32 size=25 value='<?php echo $city; ?>'></td>
                    </tr>
                    <tr>
                        <td><p class=ptd><b>&nbsp;&nbsp;&nbsp;<nobr>E-mail</nobr></b></td>
                        <td><input type=text name=email size=25 maxlength=32 value='<?php echo $email; ?>'></td>
                    </tr>
                    <tr>
                        <td><p class=ptd><b>&nbsp;&nbsp;&nbsp;URL</b></td>
                        <td colspan="2"><input type=text size=40 name=url maxlength=36 value='<?php echo $url; ?>'></td>
                    </tr>
                    <tr>
                        <td colspan="3" height="10"><nop></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p class=ptd><b><em class=em>��������� *<em></b><br>
                                <textarea cols=42 rows=5 name=msg></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <input type="submit" value="��������">&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </td><td>
                <table border="0" cellspacing="1" cellpadding="4">
                    <tr align="left"><td><p class=ptext><u><i><b><nobr>��������������  ����:</nobr></b></i></u></td></tr>
                    <tr><td><p class=ptext><nobr>[b]<b>������</b>[/b]</nobr></td></tr>
                    <tr><td><p class=ptext><nobr>[i]<i>���������</i>[/i]</nobr></td></tr>
                    <tr><td><p class=ptext><nobr>[u]<u>������������</u>[/u]</nobr></td></tr>
                    <tr><td><p class=ptext><nobr>[sup]<sup>������� ������</sup>[/sup]</nobr></td></tr>
                    <tr><td><p class=ptext><nobr>[sub]<sub>������ ������</sub>[/sub]</nobr></td></tr>
                </table>
            </td></tr></table>
</form>
</body>
</html>