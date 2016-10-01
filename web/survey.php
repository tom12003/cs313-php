<!DOCTYPE html>
<html lang="en">
<head>
	<title>03.6: PHP Survey</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/home.css">
</head>
<body>
	<main class="" id="Content" role="main">
		<div class="" id="page-content">
			<div class="">
				<h1 class="headerText">Student Survey</h1>
			</div>
			<div class="">
				<div class="answerBox">
					<?php
					if (!isset($_SESSION['start'])) {
						session_start();
					} else {
						header("Location: resultsForm.php");
						exit;
					}
					?>
					<form action="resultsForm.php" target="targetframe" method="POST">
						<label>Favorite day of the week:</label><br/>
						<div class="answerBox">
							<input type="radio" name="day" value="Sunday">Sunday<br/>
							<input type="radio" name="day" value="Monday">Monday<br/>
							<input type="radio" name="day" value="Tuesday">Tuesday<br/>
							<input type="radio" name="day" value="Wednesday">Wednesday<br/>
							<input type="radio" name="day" value="Thursday">Thursday<br/>
							<input type="radio" name="day" value="Friday">Friday<br/>
							<input type="radio" name="day" value="Saturday">Saturday<br/>
						</div><br/>
						<label>Favorite Season:</label><br/>
						<div class="answerBox">
							<input type="radio" name="season" value="Winter">Winter<br/>
							<input type="radio" name="season" value="Spring">Spring<br/>
							<input type="radio" name="season" value="Summer">Summer<br/>
							<input type="radio" name="season" value="Fall">Fall<br/>
						</div><br/>
						<label>Favorite Meal:</label><br/>
						<div class="answerBox">
							<input type="radio" name="meal" value="Breakfast">Breakfast<br/>
							<input type="radio" name="meal" value="Lunch">Lunch<br/>
							<input type="radio" name="meal" value="Dinner">Dinner<br/>
						</div><br/>
						<label>The age old question:</label><br/>
						<div class="answerBox">
							<input type="radio" name="pet" value="Cats">Cats<br/>
							<input type="radio" name="pet" value="Dogs">Dogs<br/>
							<input type="radio" name="pet" value="Neither cats or dogs">Neither cats or dogs<br/>
						</div><br/>
						<br/>
						<input class="comments" type="submit" name="submit" value="Submit" onclick="startSession()">
					</form>
					<br/><a class="comments" href="resultsForm.php" target="targetframe">Go to results</a>
				</div>
			</div>
		</div>
	</main>
</body>
</html>