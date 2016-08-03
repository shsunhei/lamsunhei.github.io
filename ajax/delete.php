<?php require '../config/db_config.php';?>

<?php
	parse_str(file_get_contents('php://input'), $data);
	$id=$data['hospId'];
	$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());//make a connnection to the database
	mysql_select_db(DB_DATABASENAME, $conn);//select the schema
	$sql = "delete from appointment where hospitalId = ".$id;//delete sql;
	mysql_query($sql, $conn) or die("Error in query: $sql. ".mysql_error());//execute delete operation
	mysql_close($conn);//close the connection
	echo json_encode(array("msg"=>"success","hospId"=>$data['hospId']));
?>