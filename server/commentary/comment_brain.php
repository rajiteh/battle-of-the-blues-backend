<?php
	require_once('auth.php');
	
?>

<?php

require 'medoo.php';
$database = new medoo("botb");

$val=$_GET['val'];
$tag=$_GET['tag'];

if($tag=="del"){
	$database->delete("text", array("id"=>$val));
	echo "Deleted";
}
	
else{

 	$database->insert("text", array("commentary" => $val));
 	
		echo "Full Updated!";
		
	$database->update("score", array("last_comment" => $val,"id"=>"1" ));
	$database->update("scoredb", array("daata" => $val,"id"=>"1" ));
	
		echo "Full Updated!";

}

?>