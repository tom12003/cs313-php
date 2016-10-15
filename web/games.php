<html>
<head>
	<title>Matt Tomlinson's Home Page</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/home.css"></link>
	<link rel='icon' type='image/x-icon' href='favicon.ico'/>
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
			</tr>
			
			<?php
		// default Heroku Postgres configuration URL
			$dbUrl = getenv('DATABASE_URL');
			if (empty($dbUrl)) {
		// example localhost configuration URL with postgres username and a database called cs313db
				$dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
			}

			$dbopts = parse_url($dbUrl);
		//print "<p>$dbUrl</p>\n\n";
			$dbHost = $dbopts["host"]; 
			$dbPort = $dbopts["port"]; 
			$dbUser = $dbopts["user"]; 
			$dbPassword = $dbopts["pass"];
			$dbName = ltrim($dbopts["path"],'/');

			try {
				$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
				foreach ($db->query('SELECT priority, title, price, releasedate, dateadded, rating FROM games') as $row)
				{
					echo '<tr>';
					echo '<td class="tg-yw4l">'.$row['priority'].'</td>';
					echo '<td class="tg-yw4l">'.$row['title'].'</td>';
					echo '<td class="tg-yw4l">'.'$' .$row['price']'.00'.'</td>';
					echo '<td class="tg-yw4l">'.$row['releasedate'].'</td>';
					echo '<td class="tg-yw4l">'.$row['rating'].'</td>';
					echo '</tr>';
				//echo '<p>';
				//echo '<strong>' . $row['priority'] . '. ' . $row['title'] . ' : ' . '</strong>';
				//echo ' $' . $row['price']  . '.00  ' . $row['releasedate'];
				//echo '</p>';
				}
			}
			catch (PDOException $ex) {
				print "<p>error: $ex->getMessage() </p>\n\n";
				die();
			}
			?>
			<tr>
				<td class="tg-yw4l"></td>
				<td class="tg-yw4l"></td>
				<td class="tg-yw4l"></td>
				<td class="tg-yw4l"></td>
				<td class="tg-yw4l"></td>
			</tr>
		</table>
		<script type="text/javascript" charset="utf-8">var TgTableSort=window.TgTableSort||function(n,t){"use strict";function r(n,t){for(var e=[],o=n.childNodes,i=0;i<o.length;++i){var u=o[i];if("."==t.substring(0,1)){var a=t.substring(1);f(u,a)&&e.push(u)}else u.nodeName.toLowerCase()==t&&e.push(u);var c=r(u,t);e=e.concat(c)}return e}function e(n,t){var e=[],o=r(n,"tr");return o.forEach(function(n){var o=r(n,"td");t>=0&&t<o.length&&e.push(o[t])}),e}function o(n){return n.textContent||n.innerText||""}function i(n){return n.innerHTML||""}function u(n,t){var r=e(n,t);return r.map(o)}function a(n,t){var r=e(n,t);return r.map(i)}function c(n){var t=n.className||"";return t.match(/\S+/g)||[]}function f(n,t){return-1!=c(n).indexOf(t)}function s(n,t){f(n,t)||(n.className+=" "+t)}function d(n,t){if(f(n,t)){var r=c(n),e=r.indexOf(t);r.splice(e,1),n.className=r.join(" ")}}function v(n){d(n,L),d(n,E)}function l(n,t,e){r(n,"."+E).map(v),r(n,"."+L).map(v),e==T?s(t,E):s(t,L)}function g(n){return function(t,r){var e=n*t.str.localeCompare(r.str);return 0==e&&(e=t.index-r.index),e}}function h(n){return function(t,r){var e=+t.str,o=+r.str;return e==o?t.index-r.index:n*(e-o)}}function m(n,t,r){var e=u(n,t),o=e.map(function(n,t){return{str:n,index:t}}),i=e&&-1==e.map(isNaN).indexOf(!0),a=i?h(r):g(r);return o.sort(a),o.map(function(n){return n.index})}function p(n,t,r,o){for(var i=f(o,E)?N:T,u=m(n,r,i),c=0;t>c;++c){var s=e(n,c),d=a(n,c);s.forEach(function(n,t){n.innerHTML=d[u[t]]})}l(n,o,i)}function x(n,t){var r=t.length;t.forEach(function(t,e){t.addEventListener("click",function(){p(n,r,e,t)}),s(t,"tg-sort-header")})}var T=1,N=-1,E="tg-sort-asc",L="tg-sort-desc";return function(t){var e=n.getElementById(t),o=r(e,"tr"),i=o.length>0?r(o[0],"td"):[];0==i.length&&(i=r(o[0],"th"));for(var u=1;u<o.length;++u){var a=r(o[u],"td");if(a.length!=i.length)return}x(e,i)}}(document);document.addEventListener("DOMContentLoaded",function(n){TgTableSort("tg-7jIQ2")});</script>
	</div>
</body>
</html>