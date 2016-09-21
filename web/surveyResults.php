<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hunter J Marshall</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/homePage.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="http://hunterjmarshall.com/">Hunter J Marshall</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">WHAT</a>
						<ul class="dropdown-menu">
							<li><a href="http://hunterjmarshall.com/html/portfolio.html">Portfolio</a></li>
							<li><a href="http://hunterjmarshall.com/documents/HunterMarshallResume.pdf">Resume</a></li>
							<li><a href="http://hunterjmarshall.com/html/testimonials.html">Testimonials</a></li>
							<li><a href="http://hunterjmarshall.com/html/contactMe.html">Contact Me</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">WHO</a>
						<ul class="dropdown-menu">
							<li><a href="http://hunterjmarshall.com/html/hobbies.html">Hobbies</a></li>
							<li><a href="http://hunterjmarshall.com/html/pictures.html">Pictures</a></li>
							<li><a href="http://hunterjmarshall.com/html/blog.html">Blog</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- First Container -->
	<div class="container-fluid backgd"> 
		<div class="row">
			<div class="col-sm-12">
			<?php
				require 'results.php';
			?>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer class="footer-default">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-2">
				<ul style="list-style:none;">
					<li><h4 class="foot">What I Am</h4></li>
					<li><a href="http://hunterjmarshall.com/html/portfolio.html">Portfolio</a></li>
					<li><a href="http://hunterjmarshall.com/documents/HunterMarshallResume.pdf">Resume</a></li>
					<li><a href="http://hunterjmarshall.com/html/testimonials.html">Testimonials</a></li>
					<li><a href="http://hunterjmarshall.com/html/contactMe.html">Contact Me</a></li>
				</ul>
			</div>
			<div class="col-sm-2">
				<ul style="list-style:none;">
					<li><h4 class="foot">Who I Am</h4></li>
					<li><a href="http://hunterjmarshall.com/html/hobbies.html">Hobbies</a></li>
					<li><a href="http://hunterjmarshall.com/html/pictures.html">Pictures</a></li>
					<li><a href="http://hunterjmarshall.com/html/blog.html">Blog</a></li>
				</ul>
			</div>
			<div class="col-sm-2">
				<ul style="list-style:none;">
					<li><h4 class="foot">Contact Me</h4></li>
					<li>Rexburg, ID</li>
					<li>618.514.8390</li>
					<li>hjmarshall18@gmail.com</li>
					<li><a href="https://www.linkedin.com/in/hjmarshall18">My LinkedIn</a></li>
					<li><a href="https://github.com/hjcoder18">My Github</a></li>
				</ul>
			</div>
		</div>
		<p style="text-align:center; padding-top:20px;">Copyright &copy; 2016 Hunter Marshall - made by Hunter.</p>
	</footer>
</body>
</html>