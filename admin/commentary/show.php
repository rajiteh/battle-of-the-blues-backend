

<?php
require_once('auth.php');
	
require 'medoo.php';

$database = new medoo("botb");
$datas=$database->select("text","*",array("ORDER" => "id DESC",) );
foreach($datas as $data)
{
echo "$data[id]"."#"."$data[commentary]"."<br/>------------<br/>";
}

?>
