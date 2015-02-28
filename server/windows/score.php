<?php  
require 'medoo.php';

$count = file_get_contents("count_com_sc.txt");
$count = trim($count);
$count = $count + 1;
$fl = fopen("count_com_sc.txt","w+");
fwrite($fl,$count);
fclose($fl);
$database = new medoo("botb");
$datas=$database->select("score", "*");

header('Content-Type: text/xml');  
  
echo '<?xml version="1.0" encoding="ISO-8859-1"?>  
<rss version="2.0">  
<channel>  
<title>My SCORE Name</title>  
<description>A description of the feed</description>  
<link>The URL to the website</link>';  

  
foreach ($datas as $data){  
		echo '  
       <item>  
	   		  <title>Overs:'.
		  $data['overs'].'
		  </title>
          <description>Score <![CDATA[  
          '.$data['score'].'  
          ]]></description>  

		  
      </item>';  
}  

echo '</channel>  
</rss>';

?>  
