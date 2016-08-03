<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../resource/css/jquery.mobile.structure-1.4.5.min.css" />
<link rel="stylesheet" href="../resource/css/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="../resource/css/hospital.css"/>
<title>Hospital Appointment</title>
</head>
<body>
<div id="restau" data-role="page" data-add-back-btn="true">
	<div data-role="header"> 
		  <?php
				    //if the user logged in,the url is logout.php
		            $loginuser = "";
				    session_start();
					if(isset($_SESSION['loginuser'])){
						$loginuser = $_SESSION['loginuser'];
				?>
				<a href="../myappointment.php" data-role="button" data-icon="user"><?=$_SESSION['loginuser'] ?></a>
				<?php
				}else{//if the user didn't logged in,the url is login.php
				?>
	        <a href="../login.php" data-role="button" data-icon="grid">LOGIN</a>
	        <?php }?>
		<h1>Hospital Appointment</h1>
		<a href="hospitallist.php" data-role="button" data-icon="back" data-rel="back">Back</a>
	</div> 
	
	<div data-role="content">
	<div class="ui-grid-a" id="restau_infos">	
		<div class="ui-block-a">
		<h3>General Hospital of PLA</h3>
		<p><strong></strong></p>
		<p>strengths: </p>
			<ul> 
				<li>Professional</li>
				<li>Good equipment</li>
				<li>Careful nursing</li>
			</ul>			
		</div>		
		<div class="ui-block-b">
		<p><img src="../resource/img/hospital.jpg" alt="jeannette photo"/></p>
		<p><a href="http://www.301hospital.com.cn/en2012/web/index.html" target="_blank" rel="external" data-role="button">visit the website</a></p>
		</div>
	</div><!-- /grid-a -->
	<hr/>
	
	<div class="ui-grid-a" id="contact_infos">	
		<div class="ui-block-a">
		<h2>Contact us</h2>
		<p>The General Hospital of People’s Liberation Army(301 hospital)28 fuxing road Beijing</p>
		<p>webmaster@301hospital.com.cn</p>		
		</div>		
		<div class="ui-block-b">
		<img src="../resource/img/location2.jpg" alt="PLA"/>
		</div>
	</div><!-- /grid-a -->
	<div id="contact_buttons">	
		<a href="map2.html" data-role="button" data-icon="location">Show it in Google Map</a>
		<input type="button" value="make appointment" data-role="button" data-icon="tag" id="appointment"/>
	</div>	
	
	</div><!-- End of content -->
</div>
</body>
<script src="../resource/js/jquery-1.11.1.min.js"></script>
<script src="../resource/js/jquery.cookie.js"></script>
<script src="../resource/js/jquery.mobile-1.4.5.min.js" /></script>
<script>
success = false;
$(function(){
	$("#appointment").click(function(event) {
		//alert(event.type);//get the event type
		event.preventDefault();//stop jumping to the link
		if($.cookie('loginuser')==null){
			alert('You havn\'t loggin yet,please login!');
			event.preventDefault();//stop jumping to the link
		}else{
			if(success==false){
				success=true;
				$.ajax({
			        url: '../ajax/appoint.php',
			        type: 'POST',
			        dataType: 'json',
			    	data:  {username: "<?php echo $loginuser; ?>", hospitalId: 2,time:<?php echo time()?>},
			    }).done(function(data, status, xhr) {
			    	if(data.msg=="success"){
				    	alert('appointment is made!');
			    	}else{
			    		alert('Fail to make the appointment!');
			    	}
			    }).fail(function(xhr, status, error) {
			    });
			}else{
				alert("You have already make appointment!");
			}
		}
		event.preventDefault();//stop jumping to the link
	});
})
</script>
</html>