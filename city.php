<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="resource/css/index.css"/> -->
<link rel="stylesheet" href="resource/css/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="resource/css/city.css"/>
<title>Hospital Appointment</title>
</head>
<body>
	<div data-role="page" id="main"  data-add-back-btn="true">
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
	    	<a href="index.php" data-role="button" data-icon="back" data-rel="back">Back</a>
        </div>
		<div data-role="content">
			<h2>Step 2:Which city are you in?</h2>
			<ul id="citylist" data-role="listview"  data-inset="true" data-filter="true" data-filter-placeholder="search city...">
			</ul>
		</div>
		<div data-role="footer"></div>
	</div>
</body>
<script src="resource/js/jquery-1.11.1.min.js"></script>
<script src="resource/js/jquery.mobile-1.4.5.min.js" /></script>
<script src="resource/js/json2.js" /></script>
<script>
$(document).ready(function() {
	$.get("ajax/citylist.php",function(data){
		//alert(data);
		var jsonObj=JSON.parse(data);
		//alert(typeof(jsonList));//object
		$.each(jsonObj.list,function(key,value){
			//alert(key);
			//alert(JSON.stringify(value));
			 $("#citylist").append(
					 "<li><a href=\"hospitallist.php\" class=\"ui-btn ui-btn-icon-right ui-icon-carat-r\">"+value.name+"</a></li>"
			);
        });
	});

})
</script>
</html>