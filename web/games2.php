<html>
<head>
	<title>Matt Tomlinson's Home Page</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/home.css"></link>
	<link rel='icon' type='image/x-icon' href='favicon.ico'/>
	<script>
		function check_empty() {
			if (document.getElementById('priority').value == "" || document.getElementById('title').value == "" || document.getElementById('price').value == "" || document.getElementById('releasedate').value == "" || document.getElementById('rating').value == "") {
				alert("Please fill out all fields.");
			} else {
				document.getElementById('form').submit();
				alert("Form Submitted Successfully.");
			}
		}
	</script>
</head>
<body>
	<h1 class="headerText">Games Wish List</h1>
	
	<div class="answerBox">
		<table id="tg-7jIQ2" class="tg">
			<tr>
				<th class="tg-yw4l">Priority</th>
				<th class="tg-yw4l">Game</th>
				<th class="tg-yw4l">Price</th>
				<th class="tg-yw4l">Release Date</th>
				<th class="tg-yw4l">Rating</th>
				<th class="tg-yw4l">Publisher</th>
			</tr>
			
			<?php
			
			$dbUrl = getenv('DATABASE_URL');
			
			if (empty($dbUrl)) {
				$dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
			}
			
			$dbopts = parse_url($dbUrl);
			
			$dbHost = $dbopts["host"]; 
			$dbPort = $dbopts["port"]; 
			$dbUser = $dbopts["user"]; 
			$dbPassword = $dbopts["pass"];
			$dbName = ltrim($dbopts["path"],'/');

			if (isset($_POST['add'])) {
					try{
						$conn = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
						
						$priority = $_POST['priority'];
						$title = $_POST['title'];
						$price = $_POST['price'];
						$releasedate = $_POST['releasedate'];
						$rating = $_POST['rating'];
						$name = $_POST['name'];
						
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
						$query = "INSERT INTO games(priority, title, price, publisherid, platformid, releasedate, dateadded, rating) VALUES('" . $priority . "', '" . $title . "', '" . $price . "', '".$name."', '1', '" . $releasedate . "', 'now()', '" . $rating . "')";
						
						$conn->exec($query);
					}
					catch(PDOException $e){
						echo $query . "<br>" . $e->getMessage();
					}
					$conn = null;
			}
			
			if (isset($_POST['remove'])) {
					try{
						$conn = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
						
						$title = $_POST['title'];
						
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
						$query = "DELETE FROM games where title='".$title."'";
						
						$conn->exec($query);
					}
					catch(PDOException $e){
						echo $query . "<br>" . $e->getMessage();
					}
					$conn = null;
			}
			
			if (isset($_POST['addPublisher'])) {
					try{
						$conn = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
						
						$name = $_POST['name'];
						$url = $_POST['url'];
						
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
						$query = "INSERT INTO publishers(name, url) VALUES('" . $name . "', '" . $url . "')";
						
						$conn->exec($query);
					}
					catch(PDOException $e){
						echo $query . "<br>" . $e->getMessage();
					}
					$conn = null;
			}
			
			try {
								
				$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
				
				foreach ($db->query('SELECT priority, title, price, releasedate, dateadded, rating, p.name, p.url FROM games g INNER JOIN publishers p on p.publisherid = g.publisherid ORDER BY priority') as $row)
				{
					echo '<tr>';
					echo '<td class="tg-yw4l">'.$row['priority'].'</td>';
					echo '<td class="tg-yw4l">'.$row['title'].'</td>';
					echo '<td class="tg-yw4l">'.'$'.$row['price'].'</td>';
					echo '<td class="tg-yw4l">'.$row['releasedate'].'</td>';
					echo '<td class="tg-yw4l">'.$row['rating'].'</td>';
					//echo '<td class="tg-yw4l">'.$row['name'].'</td>';
					echo '<td class="tg-yw4l"><a href="'.$row['url'].'" class="tableLink" target="_top">'.$row['name'].'</a></td>';
					echo '</tr>';
				}
			}
			catch (PDOException $ex) {
				print "<p>error: $ex->getMessage() </p>\n\n";
				die();
			}
			?>
			</table>
			<hr>
			<h2 class="headerText">Add Item</h2>
			<div id="inputLine">
				<div id="popupContact">
				<table class="tg">
					<tr>
					<th class="tg-yw4l">Priority</th>
					<th class="tg-yw4l">Game</th>
					<th class="tg-yw4l">Price</th>
					<th class="tg-yw4l">Release Date</th>
					<th class="tg-yw4l">Rating</th>
					<th class="tg-yw4l">Publisher</th>
					<th class=""></th>
				</tr>
					<form action="games2.php" id="form" method="post" name="form" target="targetframe">
						<tr>
							<td class="tg-yw4l"><input class="addFieldint" id="priority" name="priority" placeholder=" Priority" type="text"></td>
							<td class="tg-yw4l"><input class="addField" id="title" name="title" placeholder=" Title" type="text"></td>
							<td class="tg-yw4l"><input class="addFieldint" id="price" name="price" placeholder=" Price" type="text"></td>
							<td class="tg-yw4l"><input class="addField" id="releasedate" name="releasedate" placeholder=" Releasedate" type="date"></td>
							<td class="tg-yw4l"><input class="addFieldint" id="rating" name="rating" placeholder=" Rating" type="text"></td>
							<td class="tg-yw4l">
							<select name="name">
							<?php
								foreach ($db->query('SELECT * FROM publishers ') as $row)
								{
									echo '<option value="'.$row['publisherid'].'">'.$row['name'].'</option>';
								}
							?>
							</select>
							</td>
							<!--<td class="tg-yw4l"><input class="addField" id="name" name="name" placeholder=" Name" type="text"></td>-->
							<td class=""><a href="javascript:%20check_empty()" id="submit"><img class="add" id="add" src="add.png"></a></td>
							<input type="hidden" name="add" value="true">
						</tr>
					</form>
					</table>
				</div>
			</div>
			<div>
			<h2 class="headerText">Add Publisher</h2>
					<table class="tg">
						<tr>
							<th class="tg-yw4l">Publisher</th>
							<th class="tg-yw4l">URL</th>
							<th class=""></th>
						</tr>
						<form action="games2.php" id="form" method="post" name="form" target="targetframe">
							<tr>
								<td class="tg-yw4l"><input class="addField" id="title" name="name" placeholder=" Name" type="text"></td>
								<td class="tg-yw4l"><input class="addField" id="title" name="url" placeholder=" URL" type="text"></td>
								<td class=""><input type="image" src="add.png" name="addPublisher" value="true" class="add"/></td>
							</tr>
						</form>
					</table>
			</div>
			<hr>
			<h2 class="headerText">Remove Item</h2>
				<table class="tg">
					<tr>
						<th class="tg-yw4l">Game</th>
						<th class=""></th>
					</tr>
					<form action="games2.php" id="form" method="post" name="form" target="targetframe">
						<tr>
							<td class="tg-yw4l">
							<select name="title">
							<?php
								foreach ($db->query('SELECT title FROM games ') as $row)
								{
									echo '<option value="'.$row['title'].'">'.$row['title'].'</option>';
								}
								
							?>
							</select>
							</td>
							<td class=""><input type="image" src="delete.png" name="remove" value="true" class="add"/></td>
						</tr>
					</form>
				</table>
			</div>
		<script type="text/javascript" charset="utf-8">var TgTableSort=window.TgTableSort||function(n,t){"use strict";function r(n,t){for(var e=[],o=n.childNodes,i=0;i<o.length;++i){var u=o[i];if("."==t.substring(0,1)){var a=t.substring(1);f(u,a)&&e.push(u)}else u.nodeName.toLowerCase()==t&&e.push(u);var c=r(u,t);e=e.concat(c)}return e}function e(n,t){var e=[],o=r(n,"tr");return o.forEach(function(n){var o=r(n,"td");t>=0&&t<o.length&&e.push(o[t])}),e}function o(n){return n.textContent||n.innerText||""}function i(n){return n.innerHTML||""}function u(n,t){var r=e(n,t);return r.map(o)}function a(n,t){var r=e(n,t);return r.map(i)}function c(n){var t=n.className||"";return t.match(/\S+/g)||[]}function f(n,t){return-1!=c(n).indexOf(t)}function s(n,t){f(n,t)||(n.className+=" "+t)}function d(n,t){if(f(n,t)){var r=c(n),e=r.indexOf(t);r.splice(e,1),n.className=r.join(" ")}}function v(n){d(n,L),d(n,E)}function l(n,t,e){r(n,"."+E).map(v),r(n,"."+L).map(v),e==T?s(t,E):s(t,L)}function g(n){return function(t,r){var e=n*t.str.localeCompare(r.str);return 0==e&&(e=t.index-r.index),e}}function h(n){return function(t,r){var e=+t.str,o=+r.str;return e==o?t.index-r.index:n*(e-o)}}function m(n,t,r){var e=u(n,t),o=e.map(function(n,t){return{str:n,index:t}}),i=e&&-1==e.map(isNaN).indexOf(!0),a=i?h(r):g(r);return o.sort(a),o.map(function(n){return n.index})}function p(n,t,r,o){for(var i=f(o,E)?N:T,u=m(n,r,i),c=0;t>c;++c){var s=e(n,c),d=a(n,c);s.forEach(function(n,t){n.innerHTML=d[u[t]]})}l(n,o,i)}function x(n,t){var r=t.length;t.forEach(function(t,e){t.addEventListener("click",function(){p(n,r,e,t)}),s(t,"tg-sort-header")})}var T=1,N=-1,E="tg-sort-asc",L="tg-sort-desc";return function(t){var e=n.getElementById(t),o=r(e,"tr"),i=o.length>0?r(o[0],"td"):[];0==i.length&&(i=r(o[0],"th"));for(var u=1;u<o.length;++u){var a=r(o[u],"td");if(a.length!=i.length)return}x(e,i)}}(document);document.addEventListener("DOMContentLoaded",function(n){TgTableSort("tg-7jIQ2")});</script>	
</body>
</html>