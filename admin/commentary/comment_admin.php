<?php

session_start();
	//require_once('auth.php');
?>


<?php

require 'medoo.php';
$database = new medoo("botb");

// location of the text file that will log all the ip adresses
$file = '../logs/commentary_log.txt';

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

<title>Comment Admin</title>

<script>
//!!!!!!!!!!!!!!!!!!!UPDATE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//	
  function add(){
     var text = document.getElementById("comment").value;
	 var tag= "comment";
	 text=text.replace(/\n\r?/g, '<br/>'); 
     send(tag,text);
	  }

	 function del(){
     var text = document.getElementById("dele").value;
	 var tag= "del";
     var sure = confirm("Are you sure?")
     if (sure)
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
			// REMOVE WHEN FINALISING  ONLY FOR TESTING !!
			document.getElementById("results").innerHTML=xmlhttp.responseText;
			 document.getElementById("comment").value="";
			}
		  }
		xmlhttp.open("GET","comment_brain.php?tag="+tag+"&val="+val,true);
		xmlhttp.send();	
	  }	  
</script>
</head>

<body background="../img/bg.png" >

<div class="container">
<div class="container-fluid">
 	<h2>BOTB: Commentary Admin Panel: 
	<?php echo $_SESSION['SESS_FIRST_NAME'];?></h2>
    <p><a class="btn btn-danger" href="../login/logout.php"> <i class=" icon-arrow-left icon-white"></i>  Logout</a></p>
   
    
    
    <div class="row-fluid">

		 <div class="span6"> <p></p>
        <p> Insert to commentary:</p>       
<textarea rows="8" style="width:350px" id="comment">
</textarea>
 <button class="btn btn-primary " onclick="add()" type="button">Add Commentary</button>

<p></p><p></p>
ID:<input class="input-small" type="text"  id="dele" />
<p></p>
 <button class="btn btn-danger " onclick="del()" type="button">Delete Comment</button>

</div>

 <span style="width:20%; font-size:15px" class="label label-success"><tt id="results">Result</tt></span> 
 
		<div id="ifra" class="span6">        
<iframe id="ifram" src="show.php" frameborder="0" height="500px" width="430px"></iframe>
  </div>
 
 
 
 </div>
 </div>
 </div>



<script src="http://code.jquery.com/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


