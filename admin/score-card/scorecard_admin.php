<?php
	require_once('auth.php');
?>


<?php

require 'medoo.php';
$database = new medoo("botb");

// location of the text file that will log all the ip adresses
$file = '../logs/scorecard_log.txt';

// ip address of the visitor
$ipadress = $_SERVER['REMOTE_ADDR'];

// date of the visit that will be formated this way: 29/May/2011 12:20:03
$date = date('d/F/Y h:i:s');

// name of the page that was visited
$webpage = $_SERVER['SCRIPT_NAME'];

// visitor's browser information
$browser = $_SERVER['HTTP_USER_AGENT'];

// Opening the text file and writing the visitor's data
$fp = fopen($file, 'a');

fwrite($fp, $ipadress.' - ['.$date.'] '.$webpage.' '.$browser."\r\n");

fclose($fp);
$scorecard = "";
$scorecardfetch = $database->select("scorecard", "*");
if (count($scorecardfetch) > 0)
    $scorecard = $scorecardfetch[0]["text"];




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
 <style>
 input.qtyplus { width:25px; height:25px;}

 </style>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Score-Card Admin</title>

<script>
//!!!!!!!!!!!!!!!!!!!UPDATE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//	
  function add(){
     var text = document.getElementById("scorecard").value;
	 var tag= "scorecard";
     send(tag,text);
	  }

     function refreshIframe1() {
           $("#ifram")[0].src = $("#ifram")[0].src;
       } 
	   
 
 function send(tag,val)
	  {			
	if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  { 
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				refreshIframe1();
			document.getElementById("results").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","scorecard_brain.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("tag="+tag+"&val="+val);
	  }
</script>
</head>

<body background="../img/bg.png" >

<div class="container">
<div class="container-fluid">
 	<h2>BOTB: Score-Card Admin Panel: 
	<?php echo $_SESSION['SESS_FIRST_NAME'];?></h2>
    <p><a class="btn btn-danger" href="../login/logout.php"> <i class=" icon-arrow-left icon-white"></i>  Logout</a></p>
   
    
    
    <div class="row-fluid">

		 <div class="span6"> <p></p>
        <p> Insert to Score-Card:</p>       
<textarea rows="8" style="width:350px" id="scorecard">
<?php echo $scorecard ?>
</textarea>
 <button class="btn btn-primary " onclick="add()" type="button">Update Score-Card</button>

<p></p>

</div>

 <span style="width:20%; font-size:15px" class="label label-success"><tt id="results">Result</tt></span> 
 
		<div id="ifra" class="span6">        
<iframe id="ifram" src="http://botb-preview.rajiteh.com/#scorecard" frameborder="0" height="560px" width="430px"></iframe>
  </div>
 
 
 
 </div>
 </div>
 </div>



<script src="http://code.jquery.com/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

