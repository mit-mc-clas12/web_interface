<!DOCTYPE html>
<html>
	<head>
		<title>CLAS12 Monte-Carlo Job Submission Portal</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="main.css"/>
		<script type="text/javascript"> var username = "<?= $_SERVER['PHP_AUTH_USER'] ?>";</script>
		<script src="main.js"></script>
	</head>
	
	<body>
		<header class="w3-panel w3-container" id="myHeader">
			<ul id="nav">
				<li><a href="index.php">     Home</a></li>
				<li><a href="about.html">    About</a></li>
				<li><a href="disk.php">      Disk Usage</a></li>
				<li><a href="osgStats.html"> OSG Stats</a></li>
			</ul>
			
			<div class="w3-center">
				<h1 class="w3-xlarge w3-opacity">CLAS12 Monte-Carlo Job Submission Portal</h1>
				<h2 class="w3-xlarge" style="text-align:center">Logged in as <img width = "160" src="username.php"/></h2>
				<br/><br/>
			</div>
			
			<div class="w3-padding w3-center">
				
				<div id="farmStats"></div>
				<br>
				<br>
				<div id="osgLog"></div>
				<br>
				<br>
				
			</div>
		</header>
		
		<div class="w3-row-padding w3-center w3-margin-top">
			
			<?php
				//$command = escapeshellcmd("whoami");
				//$output = shell_exec($command);
				//echo ($output);
				echo "<h2>";
				while ($on = current($_POST)){
					echo key($_POST);
					echo "   ";
					next($_POST);
				}
			echo "will be cancelled on request.</h2>";
				?>
			
		</div>
		
	</body>
</html>
