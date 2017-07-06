<?php
	ob_start();
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Guide Me</title>
<link rel="stylesheet" type="text/css" href="css.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
	var slideIndex = 1;  
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}
 	
	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("dot");

	  if (n > slides.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = slides.length}
	
	  for (i = 0; i < slides.length; i++) {
	      slides[i].style.display = "none";  
	  }
	  for (i = 0; i < dots.length; i++) {
	      dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " active";
	}
</script>
</head>
<body>

		<div class="logo"><p>GUIDE ME</p></div>
		
		<div class="slide">
		  <span class="dot" onclick="currentSlide(1)"></span> 
		  <span class="dot" onclick="currentSlide(2)"></span> 
		  <span class="dot" onclick="currentSlide(3)"></span>
		  <span class="dot" onclick="currentSlide(4)"></span> 
		</div>
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		<div class="slideswrap">
			<div class="mySlides fade">
				<div id="text">WE ARE ALL CONNECTED BY A LOVE FOR TRAVEL</div>
				<img class="img1" src="pic1.jpeg" style="width:100%">
				<img class="img2" src="pic1.jpeg" style="width:70%">
			</div>
			<div class="mySlides fade">
				<div id="text"> ONCE A YEAR GO SOME PLACE YOU`VE NEVER BEEN BEFORE</div>
				<img class="img1" src="picture2.jpg" style="width:100%">
				<img class="img2" src="picture2.jpg" style="width:70%">
			</div>
			<div class="mySlides fade">
				<div id="text"> PEOPLE DON`T TAKE TRIPS, TRIPS TAKE PEOPLE</div>
				<img class="img1" src="picture3.jpeg" style="width:100%">
				<img class="img2" src="picture3.jpeg" style="width:70%">
			</div>
			<div class="mySlides fade">
				<div id="text">TRAVEL FAR ENOUGH, YOU MEET YOURSELF</div>
				<img class="img1" src="pic4.jpeg" style="width:100%">
				<img class="img2" src="pic4.jpeg" style="width:70%">
			</div>
		</div>
		<div class="links">
			<ul>
				<li>
					<?php 
						if($_SESSION['logged_in'] == 1){
							echo "<a href=login-system/profile.php>PROFILE</a>";
						}
						else{
							echo "<a href=login-system/index.php>SIGN IN</a>";
						}
					?>
      			</li>
				<li><a href="language.html">ENGLISH   ^</a>
					<ul class="languages">
						<li><a href="">UZBEK</a></li>
						<li><a href="">ENGLISH</a></li>
						<li><a href="">KOREAN</a></li>
						<li><a href="">CHINESE</a></li>
						<li><a href="">RUSSIAN</a></li>
					</ul>
				</li>
				<li>
					<?php 
						if($_SESSION['logged_in'] == 1){
							echo "<a href=filters/filter1/index.php>Tours</a>";
						}
						else{
							echo "<a href=howtouse.html>HOW TO USE</a>";
						}
					?>
				</li>
				<li><a href="contacts/form.php">SUPPORT</a></li>
			</ul>
		</div>
			
</body>
</html>
