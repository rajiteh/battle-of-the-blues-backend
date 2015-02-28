<?php
header('Content-Type: application/json');

$count = file_get_contents("count.txt");
$count = trim($count);
$count = $count + 1;
$fl = fopen("count.txt","w+");
fwrite($fl,$count);
fclose($fl);

require 'medoo.php';
$database = new medoo("botb");
$datas = $database->select("score", "*");

$arr = array();
$arr1 = array();
$arr2 = array();
$final=  array();

foreach($datas as $data){
	
$arr = array('score' => $data["score"],'wickets' => $data["wickets"],'overs' => $data["overs"],'old' => $data["old"],'other' => 				$data["other"], 'day' => $data["day"], 'bat' => $data["bat"],'text' => $data["text"],'current' => $data["current_bat"],'last' => $data["last_comment"],'vdo' => $data["vdo"] );

}

$d2 = $database->select("players",array("ball","name","runs"), array("id" => 1));

foreach($d2 as $data){
$arr1 = array('name1' => $data["name"],'score1' => $data["runs"],'balls1' => $data["ball"]);	
}

$d22 = $database->select("players",array("ball","name","runs"), array("id" => 2));

foreach($d22 as $data)
{
$arr2 = array('name2' => $data["name"],'score2' => $data["runs"],'balls2' => $data["ball"]);	
}
$final= array_merge((array)$arr,(array)$arr1);



 	echo json_encode($arr+$arr1+$arr2);   
  
   ?>