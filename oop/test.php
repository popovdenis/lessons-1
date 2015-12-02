<?php
class tables
{
    public function getTable($arr)
    {
        echo "<table cellpadding='5' cellspacing='0' border='1'>";
        foreach ($arr as $key => $val) {
            echo "<tr>";
            echo "<td>";
            echo $key;
            echo "</td>";
            echo "<td>";
            echo $val;
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
$array = array(
    "name" => "Иванов И.И.",
    "age" => "25",
    "email" => "ivanov@mail.ru");
$table = new tables;
echo $table->getTable($array);