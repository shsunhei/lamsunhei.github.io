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
	<div data-role="page" id="main">
	    <div data-role="header">
	    		<?php
				    //if the user logged in,the url is logout.php
				    session_start();
					if(isset($_SESSION['loginuser'])){
				?>
	        <a href="index.php" data-role="button" data-icon="home"><?=$_SESSION['loginuser'] ?></a>
	        <h2>Hospital Appointment</h2>
	        <a href="logout.php" data-role="button" data-icon="power">LOGOUT</a>
	        <?php
				}else{  //if the user didn't logged in,the url is login.php
			?>
				<a href="login.php" data-role="button" data-icon="home">LOGIN</a>
	        	<h2>Hospital Appointment</h2>
			<?php }
			?>
	    	
        </div>
		<div data-role="content"  data-inset="true">
			<h2>My Appointment</h2>
			<ul data-role="listview">
			<?php
				$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());//make a connnection to the database
				mysql_select_db(DB_DATABASENAME, $conn);//select the schema
				$sql = "SELECT * FROM appointment WHERE username = '".$_SESSION['loginuser']."'";//query sql
				$result = mysql_query($sql, $conn) or die("Error in query: $sql. ".mysql_error());//execute query operation
				mysql_close($conn);//close the connection
				
				while($row = mysql_fetch_array($result)){
					if($row['hospitalId']==1){
						echo "<li data-icon=\"delete\"><a href=\"#\" hospId=\"1\">Union Medical College Hospital</a></li>";
					}
					if($row['hospitalId']==2){
						echo "<li data-icon=\"delete\"><a href=\"#\" hospId=\"3\">General Hospital of PLA</a></li>";
					}
					if($row['hospitalId']==3){
						echo "<li data-icon=\"delete\"><a href=\"#\" hospId=\"3\">People Hospital of Peking University</a></li>";
					}
				}
			?>
			</ul>
		</div>
	</div>
</body>
<script src="resource/js/jquery-1.11.1.min.js"></script>
<script src="resource/js/jquery.mobile-1.4.5.min.js" /></script>
<script>
$(function(){
	$("[href='#']").click(function(event) {
		event.preventDefault();
		$.ajax({
			url: 'ajax/delete.php',
			type: 'DELETE',
	        dataType: 'json',
	    	data:  {hospId: $(this).attr("hospId"),time:<?php echo time()?>},
	    }).done(function(data, status, xhr) {
		    if(data.msg=="success"){
		    	alert('appointment is cancelled!');
		    	window.location.href = "myappointment.php";
			}else{
			   	alert('Fail to cancel the appointment!');
			}
		 }).fail(function(xhr, status, error) {
			 alert('The opration can\'t be done!');
		 });
	});
})
</script>
</html>