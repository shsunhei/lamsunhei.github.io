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
	        <a href="myappointment.php" data-role="button" data-icon="user"><?=$_SESSION['loginuser'] ?></a>
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
			<h2>Step 1:What's your problem?</h2>
			<ul data-role="listview">
				<li><a href="city.php">Obstetrics</a></li>
				<li><a href="city.php">Neurologis</a></li>
				<li><a href="city.php">Orthopedics</a></li>
				<li><a href="city.php">Dermatology</a></li>
				<li><a href="city.php">Surgical</a></li>
				<li><a href="city.php">Cardiology</a></li>
				<li><a href="city.php">Respiration</a></li>
				<li><a href="city.php">Intestinal</a></li>
				<li><a href="city.php">Endocrinology</a></li>
				<li><a href="city.php">Gynecology</a></li>
			</ul>
		</div>
	</div>
</body>
<script src="resource/js/jquery-1.11.1.min.js"></script>
<script src="resource/js/jquery.mobile-1.4.5.min.js" /></script>
</html>