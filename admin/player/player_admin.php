<?php
	require_once('auth.php');
?>


<?php

require 'medoo.php';
$database = new medoo("botb");

// location of the text file that will log all the ip adresses
$file = '../logs/player_log.txt';

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


$dt = $database->select("players", array(
"ball",
"name","runs"), array("id" => 1));
$name1=""; 
$runs1=""; 
$balls1="";
foreach($dt as $data1)
{
$name1=$data1["name"]; 
$runs1=$data1["runs"]; 
$balls1=$data1["ball"];
}


$d2 = $database->select("players",array(
"ball",
"name","runs"), array("id" => 2));
$name2=""; 
$runs2=""; 
$balls2="";

foreach($d2 as $data)
{
$name2=$data["name"]; 
$runs2=$data["runs"]; 
$balls2=$data["ball"];
}






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
<style type="text/css">
body,td,th {
	color: #FC0;
}
body {
	background-color: #2056A9;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Player Admin Panel</title>

<script>
//!!!!!!!!!!!!!!!!!!!UPDATE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//	

	function runsi1(val){
    var value = parseInt(document.getElementById('runs1').value, 10);
    value = isNaN(value) ? 0 : value;	
    value+=val;
    document.getElementById('runs1').value = value;
}

	function runsi2(val){
    var value = parseInt(document.getElementById('runs2').value, 10);
    value = isNaN(value) ? 0 : value;
    value+=val;
    document.getElementById('runs2').value = value;
}


	function balli1(){
    var value = parseInt(document.getElementById('balls1').value, 10);
    value = isNaN(value) ? 0 : value;
	
    value++;
    document.getElementById('balls1').value = value;
}
	function balli2(){
    var value = parseInt(document.getElementById('balls2').value, 10);
    value = isNaN(value) ? 0 : value;	
    value++;
    document.getElementById('balls2').value = value;
}


  function name1(){
     var text = document.getElementById("name1").value;
	 var tag= "name1";
	 send(tag,text);
	  }
  function name2(){
     var text = document.getElementById("name2").value;
	 var tag= "name2";
	 send(tag,text);
	  }
  function runs1(){
     var text = document.getElementById("runs1").value;
	 var tag= "runs1";
	 send(tag,text);
	  }	  	  
  function runs2(){
     var text = document.getElementById("runs2").value;
	 var tag= "runs2";
	 send(tag,text);
	  }
  function balls1(){
     var text = document.getElementById("balls1").value;
	 var tag= "balls1";
	 send(tag,text);
	  }	   
  function balls2(){
     var text = document.getElementById("balls2").value;
	 var tag= "balls2";
	 send(tag,text);
	  }		
	  
	  	
function current(){
     var text = $('input[name="current"]:checked').val();
	 var tag= "batting";
	 send(tag,text);
		  }
 
     function refreshIframe1() {
           //$("#ifram")[0].src = $("#ifram")[0].src;
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
			{refreshIframe1();
			// REMOVE WHEN FINALISING  ONLY FOR TESTING !!
			document.getElementById("results").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","player_brain.php?tag="+tag+"&val="+val,true);
		xmlhttp.send();	
	  }	  
</script>
</head>

<body  >

<div class="container">

<div class="container-fluid">
 	<div class="top" div="div" style="max-height:100%; max-width:100%;">
 	  <p align="center"><img src="topbanner.png"  alt="" style="max-height:100%; max-width:100%;"/></p>
      <div align="center"><?php echo $_SESSION['SESS_FIRST_NAME'];?>
        <a class="btn btn-danger" href="../login/logout.php">Logout</a>
      </div>
 	</div>
 	<div class="row-fluid" >

	  <div class="span6">         

   <div align="center">
     <table width="899"  border="1">
       <tr style="text-align: center" >
         <td width="325"> <h4> Player 1</h4></td>
         <td width="263"><h4>Player 2</h4></td>
         <td width="430"> <span style="font-size:15px" class="label label-success"><p align="center"><tt id="results">: Status :</tt></p></span></td>
         </tr>
       <tr>
         <td><center><b>
           <p>Name 1<b><center>
           </p>
           <p>
             <input style="width:150px;" class="input" type="text" value="<?php echo $name1?>"  id="name1" />
           </p>
           <button class="btn btn-success" onclick="name1()" >Save</button>
           <p>&nbsp;</p>
           </td>
         <td><center><b>
           <p>Name 2<b><center>
           </p>
           <p>
             <input style="width:150px;" class="input-small" type="text" value="<?php echo $name2?>"   id="name2" />
           </p>
           <button class="btn btn-warning" onclick="name2()" >Save</button>
           <p>&nbsp;</p>
           </td>
         <td rowspan="4"><!--<iframe id="ifram" src="http://botb.imaadhdole.com/view/" frameborder="0" height="500px" width="430px"></iframe>--></td>
         </tr>
       <tr >  
         <td><center><b>
           <p>Runs<b><center>      
             <input class="input-small" type="text" value="<?php echo $runs1?>"  name="s" id="runs1" />
         </p>
           <p>
             <button  class="btn btn-primary" onclick="runsi1(1)" ><b>1</b></button>
             &nbsp; <button class="btn btn-primary" onclick="runsi1(4)" ><b>4</b></button>
             &nbsp; <button class="btn btn-primary" onclick="runsi1(6)" ><b>6</b></button></p>
           <button class="btn btn-success" onclick="runs1()" >Save</button>
           <p>&nbsp;</p>
           </td>     
         
         <td><center><b>
           <p>Runs<b><center>      
             <input class="input-small" type="text" name="s2" value="<?php echo $runs2?>"  id="runs2" />
         </p>
           <p>
             <button  class="btn btn-primary" onclick="runsi2(1)" ><b>1</b></button>
             &nbsp; <button class="btn btn-primary" onclick="runsi2(4)" ><b>4</b></button>
             
             &nbsp; <button class="btn btn-primary" onclick="runsi2(6)" ><b>6</b></button></p>
           <button class="btn btn-warning" onclick="runs2()" >Save</button>
           <p>&nbsp;</p>
           </td>
         </tr>
       <tr>
         <td><center><b>
           <p>Balls<b><center>
           </p>
           <p>
             <input class="input-small" type="text" name="o" value="<?php echo $balls1?>"  id="balls1" /> 
             <input  onclick="balli1()" type='button' value='+' class='qtyplus' field='quantity' />
           </p>
           <p></p>        
           <button class="btn btn-success" onclick="balls1()" >Save</button>
           <p>&nbsp;</p>
           </td>
         <td><center><b>
           <p>Balls<b><center>
           </p>
           <p>
             <input class="input-small" type="text" name="o2" value="<?php echo $balls2?>"  id="balls2" /> 
             <input  onclick="balli2()" type='button' value='+' class='qtyplus' field='quantity' />
           </p>
           <p></p>        
           <button class="btn btn-warning" onclick="balls2()" >Save</button>
           <p>&nbsp;</p>
           </td>
         </tr>
       <tr>
         <td><center><b>
           <p>Batting Now<b><center>       
             <input style="width:10em;height:5em;" type="radio" name="current" value="1" />
           </p></td>
         <td><center><b>
           <p>Batting Now<b><center>
             <input style="width:10em;height:5em;" type="radio"  name="current" value="2" />
           </p></td>
         </tr>
       
       <tr>
         
         <td colspan="2">
           <center> 
           <button class="btn btn-danger" onclick="current()" type="button">Current Batting</button>
           </td>
         </tr>
       
       
     </table>
   </div>
 
 <p align="center"></p>

</div>
	    <div id="ifra" class="span6"></div>
 
 
 
 </div>
 </div>   

 </div>



<script src="http://code.jquery.com/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


