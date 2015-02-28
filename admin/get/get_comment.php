<?php

header('Content-Type: application/json');
require 'medoo.php';

$count = file_get_contents("count_com.txt");
$count = trim($count);
$count = $count + 1;
$fl = fopen("count_com.txt","w+");
fwrite($fl,$count);
fclose($fl);

$database = new medoo("botb");
$datas=$database->select("text","*",array("ORDER" => "id DESC",) );
print json_encode($datas);
?>