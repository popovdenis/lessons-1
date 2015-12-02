<?php
$sth1 = $db->prepare("SELECT * FROM `testing` WHERE fname=?");
$sth1->execute(array('ivan'));
while($row = $sth1->fetch())
{
	print_r($row);
}
?>