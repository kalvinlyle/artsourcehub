<?php
$id = $_REQUEST['id'];

$db = new PDO('sqlite:data.sqlite');
$sql = "UPDATE company SET status = '-1' WHERE id = '$id';";

error_log($sql);

$rs = $db->query($sql);
$count = $rs->rowCount();
echo $count;
$db = NULL;
?>