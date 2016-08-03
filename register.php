<?php require 'config/db_config.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="resource/css/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="resource/css/index.css"/>
<title>Hospital Appointment</title>
</head>
<body>
	<?php
	$success = true;//a flag to judge whether the user reister successfully
	$warn="";//if the user fail to authenticate,the show the warn 
	$username="";
	$password="";
	$repassword="";
	if(isset($_POST['submit']) && $_POST['submit']) {
		error_reporting(0);
		$username = $_POST['username'];//get the username in the form
		$password = $_POST['password'];//get the password in the form
		$repassword = $_POST['repassword'];//get the repeated password in the form
		
		if($password==$repassword){
			$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());//make a connnection to the database
			mysql_select_db(DB_DATABASENAME, $conn);//select the schema
			$sql = "INSERT INTO account(id,username,password)VALUES (0,'".$username."','".sha1($password)."')";//insert sql;encrypte the password with SHA1
			mysql_query($sql, $conn) or die("Error in query: $sql. ".mysql_error());//execute insert operation
			mysql_close($conn);//close the connection
			header("Location:success.html");
		}else{
			$success = false;
			$warn ="The two passwords do not match!";
		}
	}else{} ?>
	<div data-role="page" id="main">
	    <div data-role="header">
	        <a href="index.php" data-role="button" data-icon="home">HOME</a>
	    	<h2>Register</h2>
        </div>
		<div data-role="content"  data-inset="true">
			<h3>enter your username and password</h3>
			<?php 
			    if($success==false){
			?>
				<p style="color:red"><?=$warn ?></p>
			<?php }
			?>
			<form action="register.php" method="post" >
				<label for="username">username:</label>
				<input type="text" name="username" id="username" required="true" value="<?= $username ?>"/>
				<label for="password">password:</label>
				<input type="password" name="password" id="password" required="true" value="<?= $password ?>"/>
				<label for="repassword">repeat password:</label>
				<input type="password" name="repassword" id="repassword" required="true" value="<?= $repassword ?>"/>
				<input type="submit" name="submit" data-inline="true" value="submit"><input type="reset" data-inline="true" value="reset">
			</form>
		</div>
	</div>
</body>
<script src="resource/js/jquery-1.11.1.min.js"></script>
<script src="resource/js/jquery.mobile-1.4.5.min.js" /></script>
</html>