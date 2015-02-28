<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	
	if(!isset($_SESSION['SESS_ID']) || (trim($_SESSION['SESS_ID']) == '')  ) {
		header("location: ../login/access-denied.php");
		exit();
	}
	else{
		$s=$_SESSION['SESS_FIRST_NAME'];
		if($s=="admin" || $s=="player"){

		}else{
				header("location:  ../login/access-denied.php");
		exit();
		}


	}
?>