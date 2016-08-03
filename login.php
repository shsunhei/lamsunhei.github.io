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
	require 'config/db_config.php';
	error_reporting(0);
	session_start();
	
	$success = false;//a flag to judge whether the user login successfully
	$warn="";//if the user fail to authenticate,the show the warn 
	$username="";
	$password="";
	if(isset($_POST['submit']) && $_POST['submit']) {
		$username = $_POST['username'];//get the username in the form
		$password = sha1($_POST['password']);//get the password in the form and encrypte the password with SHA1
		$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());//make a connnection to the database
		mysql_select_db(DB_DATABASENAME, $conn);//select the schema
		$sql = "SELECT * FROM account WHERE username = '".$username."' AND password = '".$password."'";//query sql
		$result = mysql_query($sql, $conn) or die("Error in query: $sql. ".mysql_error());//execute query operation
		
		while($row = mysql_fetch_array($result)){
			if (($row['username']==$username)&&($row['password']==$password)){
				$success = true;
				break;
			}
		}
		
		if($success){
			$_SESSION["loginuser"] = $username;//put the username in session
			setcookie('loginuser',$username,time()+3600);//put the username in cookie the expire time is 1 hour later
			header("Location:index.php");
		}else{
			$warn ="username and password don't match!";
		}
	}
	?>
	<div data-role="page" id="main">
	    <div data-role="header">
	    	<a href="index.php" data-role="button" data-icon="home">HOME</a>
	    	<h2>Please LOGIN</h2>
        </div>
		<div data-role="content"  data-inset="true">
			<h3>enter your username and password</h3>
			<?php 
			if($success==false){?>
				<p style="color:red"><?=$warn ?></p>
			<?php }
			?>
			<form method="post" action="login.php">
				<label for="username">username:</label>
				<input type="text" name="username" id="username" value="<?= $username ?>"/>
				<label for="password">password:</label>
				<input type="password" name="password" id="password" value="<?= $password ?>"/>
				<input type="submit" name="submit" data-inline="true" value="submit"><input type="reset" data-inline="true" value="reset">
			</form>
			<p><a href="register.php">register for account</a></p>
		</div>
	</div>
</body>
<script src="resource/js/jquery-1.11.1.min.js"></script>
<script src="resource/js/jquery.mobile-1.4.5.min.js" /></script>
</html>