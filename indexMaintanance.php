<!DOCTYPE html>
<html>
	<head>
		<title>CLAS12 Monte-Carlo Job Submission Portal</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="main.css">
		<script type="text/javascript"> var username = "<?= $_SERVER['PHP_AUTH_USER'] ?>";</script>
		<script src="main.js"></script>

	</head>
	
	<body onload='osgLogtoTable(); farmStatstoTable();'>

	<h1>
		<center>
			<font color="red">
                                May 4 2020 Maintanance at 3pm: <br/>
				the framework is being updated. <br/>
				Job Submission is suspended. <br/>
				Jobs already submitted will run normally.

			</font>
		</center>
	</h1>


		<header class="w3-panel w3-container" id="myHeader">
			
			<div class="w3-center">
				<h1 class="w3-xlarge w3-opacity">CLAS12 Monte-Carlo Job Submission Portal</h1>
				<h2 class="w3-xlarge" style="width:73%;text-align:right">Logged in as <?php $username= $_SERVER['PHP_AUTH_USER']; echo($username); ?></h2>
				<br/><br/>

				<div class="w3-padding w3-center">

					<div id="farmStats"></div>
					<br>
					<br>
					<div id="osgLog"></div>
					<br>
					<br>

				</div>
			</div>
		</header>

	</body>
</html>
