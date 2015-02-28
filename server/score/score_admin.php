<?php

require_once('auth.php');
require 'medoo.php';
$database = new medoo("botb");
// location of the text file that will log all the ip adresses
$file = '../logs/score_log.txt';

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


$dt = $database->select("score", array(
"score",
"wickets","overs","old","other","text","day","bat"), array("id" => 1));
$score=""; 
$wickets=""; 
$old="";
$overs=""; 
$other=""; 
$text="";
$day=""; 
$bat="";
foreach($dt as $data1)
{
$score=$data1["score"]; 
$wickets=$data1["wickets"]; 
$old=$data1["old"];
$overs=$data1["overs"]; 
$other=$data1["other"];
$text=$data1["text"];
$day=$data1["day"]; 
$bat=$data1["bat"];

//SD added from here

$tmpday= substr($day,0,strpos($day,"!"));
$inning= substr($day,strpos($day,"!")+1,strlen($day)-1-strpos($day,"!"));
$day=$tmpday;

//// SD ADDED UNTIL HERE

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
body {
	background-color: #2056A9;
}
body,td,th {
	color: #fff;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Score Admin Panel</title>

<script>
//!!!!!!!!!!!!!!!!!!!UPDATE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//	

	function incrementValue(val){
    var value = parseInt(document.getElementById('score').value, 10);
    value = isNaN(value) ? 0 : value;
	
    value+=val;
    document.getElementById('score').value = value;
}

	function wickets(){
    var value = parseInt(document.getElementById('w').value, 10);
    value = isNaN(value) ? 0 : value;
	
    value++;
    document.getElementById('w').value = value;
}
	function overs(){
    var value = parseFloat(document.getElementById('o').value, 10);
    value = isNaN(value) ? 0 : value;
	var check=	value*10%10;
	if(check!=5){
		value=value+0.1;
				    document.getElementById('o').value = value.toFixed(1);
		}
	else{
		value=value;
		    document.getElementById('o').value = value.toFixed(0);

		}
}





  function score1(){
     var text = document.getElementById("score").value;
	 var tag= $("#score").attr("name");
	 send(tag,text);
	  }
  function w(){
     var text = document.getElementById("w").value;
	 var tag= $("#w").attr("name");
	 send(tag,text);
	  }
  function o(){
     var text = document.getElementById("o").value;
	 var tag= $("#o").attr("name");
	 send(tag,text);
	  }	  	  
  function t(){
     var text = document.getElementById("t").value;
	 var tag= $("#t").attr("name");
	 send(tag,text);
	  }
  function old(){
     var text = document.getElementById("old").value;
	 var tag= $("#old").attr("id");
	 send(tag,text);
	  }	   
  function other(){
     var text = document.getElementById("other").value;
	 var tag= $("#other").attr("id");
	 send(tag,text);
	  }		
  function day(){
     var text = document.getElementById("day").value + "!"+ document.getElementById("inn").value ;
	 var tag= $("#day").attr("id");
	 send(tag,text);
	  }		  
  function bat(){
     var text = $('input[name="current"]:checked').val();
	 var tag= "bat";
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
			{refreshIframe1();
			// REMOVE WHEN FINALISING  ONLY FOR TESTING !!
			document.getElementById("results").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","score_brain.php?tag="+tag+"&val="+val,true);
		xmlhttp.send();	
	  }
	  
</script>
</head>

<body>

<div class="container">
<div class="container-fluid"> 
<div class="top" div style="max-height:100%; max-width:100%;"> 
 	<div class="top" div="div" style="max-height:100%; max-width:100%;">
      <p align="center"><img src="topbanner.png"  alt="" style="max-height:100%; max-width:100%;"/></p>

 <?php echo $_SESSION['SESS_FIRST_NAME'];?>
 	  <a class="btn btn-danger" href="../login/logout.php">Logout</a>
 	</div>
  
  </div>
  <div class="row-fluid">
	  <div class="span6">
         <div align="center">
           <table width="99%"  border="1" >
             <tr >
               <td width="221"><center><b>
                 <p>Score</p>
                 <p>
  <input class="input-small" type="text" name="s" value="<?php echo $score; ?>" id="score" />
                 </p>
                 <p>
                   <button  class="btn btn-primary" onclick="incrementValue(1)" ><b>1</b></button>
                     <button class="btn btn-primary" onclick="incrementValue(4)" ><b>4</b></button>
                   
                     <button class="btn btn-primary" onclick="incrementValue(6)" ><b>6</b></button>
                 </p>
                 <button class="btn btn-danger" onclick="score1()" >Save</button>               </td>
               <td width="229"><center><b>
                 <p>Wicket                 </p>
                 <p>
                   <input class="input-small" value="<?php echo $wickets; ?>" type="text" name="w" id="w" />
                 </p>
                 <p>
              <input  onclick="wickets()"   type='button' value='+' class='qtyplus' field='quantity' />
                 </p>
<button class="btn btn-primary" onclick="w()" >Save</button>               </td>
               <td width="430" rowspan="4"> <span style="font-size:15px" class="label label-success"><p align="center"><tt id="results">: Status :</tt></p></span>
                 <iframe id="ifram" src="http://botb.imaadhdole.com/view/" frameborder="0" height="500px" width="430px"></iframe>
               <div align="center"></div></td>
             </tr>
             <tr>
               <td><center><b>
                 <p>Overs<b>            <center>
                   <input class="input-small" value="<?php echo $overs; ?>" type="text" name="o" id="o" /> 
                   
                   <input  onclick="overs()" type='button' value='+' class='qtyplus' field='quantity' />
                 </p>
<button class="btn btn-primary" onclick="o()" >Save</button>               </td>
               <td><center><b>
                 <p>Text<b>                 </p>
                 <p>
                   <input class="input-small" value="<?php echo $text; ?>" type="text" name="t" id="t" maxlength="20000" />
                 </p>
<button class="btn btn-primary" onclick="t()" >Save</button>               </td>
             </tr>
             <tr>
               <td><center><b>
                 <p>Old Score</p>
                 <p>
  <input class="input-small" type="text" value="<?php echo $old; ?>" name="p1" id="old" />
                 </p>
                 <button class="btn btn-success" onclick="old()" >Save</button>               </td>
               <td><center><b>
                 <p>Other Team Score</p>
                 <p>
                   <input class="input-small" value="<?php echo $other; ?>" type="text" name="p2" id="other" />
                 </p>
                 <button class="btn btn-warning" onclick="other()" >Save</button>               </td>
             </tr>
             <tr>
               <td><center><b>
                 <p>Day</p>
                 <p>
  <input class="input-small" value="<?php echo $day; ?>"  type="text" name="b1" id="day" />
                 </p>
                 <p>Inning</p>
                 <p>
                   <input class="input-small" value="<?php echo $inning; ?>"  type="text" name="inni" id="inn" />
                 </p>
               <button class="btn btn-success" onclick="day()" >Save</button>               </td>
               <td><center><b>
                 <p>Batting team</p>
                 <p> 
            RC: <input style="width:2em;height:2em" type="radio"  name="current" value="RC" /> 
            STC: <input  type="radio"  name="current" value="STC" /> 
                 </p>
                 <button class="btn btn-warning" onclick="bat()" >Save</button>               </td>
             </tr>
  </table>
        </div>
        <p></p><!--Sidebar content-->
      </div>
  </div>
 </div>
 </div>



<script src="http://code.jquery.com/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


