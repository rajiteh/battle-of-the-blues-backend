<?php
require_once('auth.php');
?>

<?php

require 'medoo.php';
$database = new medoo("botb");

$val=$_GET['val'];
$tag=$_GET['tag'];



switch ($tag) {
 case "s":
 $database->update("score",
    array("score" => $val), array("id" => "1" ));
 echo "Score Updated!";
 break;
 case "o":
 $database->update("score",
    array("overs" => $val), array("id" => "1" ));
 echo "Overs Updated!";
 break;
 case "w":
 $database->update("score",
    array("wickets" => $val), array("id" => "1" ));
 echo "Wickets Updated!";
 break;
 case "t":
 $database->update("score",
    array("text" => $val), array("id" => "1" ));
 echo "Text Updated!";
 break;
 case "old":
 $database->update("score",
    array("old" => $val), array("id" => "1" ));
 echo "Old Score Updated!";
 break;
 case "other":
 $database->update("score",
    array("other" => $val), array("id" => 1 ));
 echo "Other team score Updated!";
 break;

 case "day":
 $database->update("score",
    array("day" => $val), array("id" => "1" ));
 echo "Day Updated!";
 break;
 case "innings":
 $database->update("score",
    array("innings" => $val), array("id" => "1" ));
 echo "Innings Updated!";
 break;

 case "bat":
 $database->update("score",
    array("bat" => $val), array("id" => "1" ));
 echo "Bat Updated!";
 break;
}

include('../../vendor/autoload.php');

$ret = Pusher::getInstance()->scoreUpdate();

if ($ret > 0) {
        echo "<br/>Cache cleared!";
}



?>