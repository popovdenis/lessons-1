<?php
//1. создание парсера
$sax = xml_parser_create("utf-8");

// назначение обработчиков начальных и конечных тегов
xml_set_element_handler($sax,  "onStart",  "onEnd");

// назначение обработчика текстового содержимого
xml_set_character_data_handler($sax,  "onText");

//2. функция-обработчик начальных тегов
function onStart($parser, $tag, $attr) {
    if ($tag == 'CD' || $tag == 'CATALOG') {
        echo '<tr>';
    }
    if ($tag != 'CD' && $tag != 'CATALOG') {
        echo '<td>';
    }
}

//3. функция-обработчик закрываюших тегов
function onEnd($parser, $tag) {
    if ($tag == 'CD' || $tag == 'CATALOG') {
        echo '</tr>';
    }
    if ($tag != 'CD' && $tag != 'CATALOG') {
        echo '</td>';
    }
}

//4. функция-обработчик текстового содержимого
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
