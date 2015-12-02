<?php
//1. �������� �������
$sax = xml_parser_create("utf-8");

// ���������� ������������ ��������� � �������� �����
xml_set_element_handler($sax,  "onStart",  "onEnd");

// ���������� ����������� ���������� �����������
xml_set_character_data_handler($sax,  "onText");

//2. �������-���������� ��������� �����
function onStart($parser, $tag, $attr) {
    if ($tag == 'CD' || $tag == 'CATALOG') {
        echo '<tr>';
    }
    if ($tag != 'CD' && $tag != 'CATALOG') {
        echo '<td>';
    }
}

//3. �������-���������� ����������� �����
function onEnd($parser, $tag) {
    if ($tag == 'CD' || $tag == 'CATALOG') {
        echo '</tr>';
    }
    if ($tag != 'CD' && $tag != 'CATALOG') {
        echo '</td>';
    }
}

//4. �������-���������� ���������� �����������
function onText($parser, $text) {
    echo $text;
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
    <title>Catalog</title>
</head>
<body>
    <h1>CD Catalog</h1>
    <table border="1" width="100%">
        <tr>
            <th>Title</th>
            <th>Artist</th>
            <th>Country</th>
            <th>Company</th>
            <th>Price</th>
            <th>Year</th>
        </tr>
        <?php
        // parsing ...
        xml_parse($sax, file_get_contents('cd_catalog.xml'));
        ?>
    </table>
</body>
</html>
