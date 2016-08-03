<?php require '../config/db_config.php';?>

<?php
	session_start();
	
	if(isset($_SESSION['loginuser'])){//if the user is logged in,the process the response,then return 403
		if(isset($_POST['username']) && $_POST['time'] && $_POST['hospitalId']) {
			$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());//make a connnection to the database
			mysql_select_db(DB_DATABASENAME, $conn);//select the schema
			$sql = "INSERT INTO appointment(id,username,hospitalId)VALUES (0,'".$_SESSION['loginuser']."','".$_POST['hospitalId']."')";//insert sql;
			mysql_query($sql, $conn) or die("Error in query: $sql. ".mysql_error());//execute insert operation
			mysql_close($conn);//close the connection
			$result=array('msg'=>'success');
			echo json_encode($result);
		}
	}else{
		header("HTTP/1.1 403 Forbidden");
	}
?>
