<!DOCTYPE html>
<?php
	@session_start();
	$hashed_password = crypt('rccssccr12n5x11/');
    if (!empty($_FILES))
    {
          $tempFile = $_FILES['file']['tmp_name'];
		  @unlink("video.mp4");
          move_uploaded_file($tempFile, "/".$_FILES['file']['name']);
       
    }
	if(isset($_POST['password'])){
		$hashed_password = crypt('rccssccr12n5x11/');
		if(crypt($_POST['password'], $hashed_password) == $hashed_password){$_SESSION['password']='rccssccr12n5x11/';}
	}
?>
<html>
	<head>
		<title>Big Match Video Highlights Upload</title>
		<script src="js/dropzone.js"></script>
		<link rel="stylesheet" type="text/css" href="css/dropzone.css"></link>
		<?if(isset($_SESSION['password'])&&crypt($_SESSION['password'], $hashed_password) == $hashed_password){
			?><script>
			Dropzone.options.myForm = {
				init: function() {
				this.on("complete", function(file) { document.getElementById("myForm").submit(); });
				}
			};
		</script>
		<?
		}?>
		
	</head>
	<body>
	<?php
		if(isset($_SESSION['password'])&&crypt($_SESSION['password'], $hashed_password) == $hashed_password){
			?>
			<form style="margin:auto;" enctype="multipart/form-data" action="upload.php" method="post"
			class="dropzone"
			id="myForm"></form>
			<?php
		}
		else{
		?>
			<form style="margin:auto;" action="upload.php" method="post">
				<input type="password" name="password" />
				<input type="submit" value="login">
			</form>
		<?php
		}
		?>
		
	</body>
</html>