<html>
<head>
	<title>Matt Tomlinson's Home Page</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/home.css"></link>
	<link rel='icon' type='image/x-icon' href='favicon.ico'/>
</head>
<body>
	<h1 class="headerText">Scriptures</h1>

	<div class="answerBox">
		<?php
		// default Heroku Postgres configuration URL
		$dbUrl = getenv('DATABASE_URL');
		if (empty($dbUrl)) {
		// example localhost configuration URL with postgres username and a database called cs313db
			$dbUrl = "postgres://postgres:password@localhost:5432/cs313db";}
			$dbopts = parse_url($dbUrl);
			print "<p>$dbUrl</p>\n\n";
			$dbHost = $dbopts["host"]; 
			$dbPort = $dbopts["port"]; 
			$dbUser = $dbopts["user"]; 
			$dbPassword = $dbopts["pass"];
			$dbName = ltrim($dbopts["path"],'/');
			try {
				$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
				foreach ($db->query('SELECT book, chapter, verse, content FROM scripture') as $row)
				{
					echo '<p>';
					echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
					echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
					echo '</p>';}}
					catch (PDOException $ex) {
						print "<p>error: $ex->getMessage() </p>\n\n";
						die();}
						?>
					</div>
				</body>
				</html>