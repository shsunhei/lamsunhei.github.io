<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="resource/css/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="resource/css/hospitallist.css"/>
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
				<?php
				}else{//if the user didn't logged in,the url is login.php
				?>
	        <a href="login.php" data-role="button" data-icon="grid">LOGIN</a>
	        <?php }?>
	    	<h2>Hospital Appointment</h2>
	    	<a href="city.php" data-role="button" data-icon="back" data-rel="back">Back</a>
        </div>
		<div data-role="content">
			<h2>Step 3:Please choose a hospital.</h2>
			<ul data-role="listview"  data-inset="true">
				<li><a href="detail/Union_Medical_College_Hospital.php" data-transition="slidedown"> <img src="resource/img/hospital_logo.jpg"/><h2>Peking Union Medical College Hospital</h2> <p class="level four"> 4 stars  </p></a></li>
				<li><a href="detail/General_Hospital_of_PLA.php" data-transition="slidedown"> <img src="resource/img/hospital_logo.jpg"/><h2>The General Hospital of the People's Liberation Army</h2> <p class="level three"> 3 stars  </p></a></li>
				<li><a href="detail/People_Hospital_of_Peking_University.php" data-transition="slidedown"> <img src="resource/img/hospital_logo.jpg"/><h2>The People's Hospital of Peking University</h2> <p class="level two"> 2 stars  </p></a></li>
			</ul>
		</div>
	</div>
</body>
<script src="resource/js/jquery-1.11.1.min.js"></script>
<script src="resource/js/jquery.mobile-1.4.5.min.js" /></script>
</html>