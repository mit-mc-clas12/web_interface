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
	<body onload='osgLogtoTable();farmStatstoTable();diskUsagetoTable();'>
		<!-- Header -->
		<header class="w3-panel w3-container" id="myHeader">
			
			<ul id="nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="disk.html">Disk Usage</a></li>
				<li><a href="osgStats.html">OSG Stats</a></li>
			</ul>

			<div class="w3-center">
				<h1 class="w3-xlarge w3-opacity">CLAS12 Monte-Carlo Job Submission Portal</h1>
				<h2 class="w3-xlarge" style="width:73%;text-align:right">Logged in as <?php $username= $_SERVER['PHP_AUTH_USER']; echo($username); ?> <br>
				</h2>

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

		<div class="w3-row-padding w3-center w3-margin-top">
			<a href="type1.html" >
				<div class="w3-quarter">
					<div class="w3-card w3-container" style="min-height:300px">
						<h3>Type 1<br></h3><br>
						<i class="w3-margin-bottom w3-text-theme" style="font-size:120px; "></i>
						<p style="text-align: left; font-weight: normal;">
							- Container CLAS12 gcard <br>
							- Container or gemc internal generator <br>
							- Arbitrary number of jobs <br>
							- Arbitrary number of events for each job (max 10,000) <br/>
						</p>
					</div>
				</div>
			</a>

			<a href="type2.html" >
				<div class="w3-quarter">
					<div class="w3-card w3-container" style="min-height:300px">
						<h3>Type 2<br></h3><br>
						<i class="w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
						<p style="text-align: left; font-weight: normal;">
							- Container CLAS12 gcard <br>
							- Use LUND files from a web location or directory in /volatile <br>
							- One job per LUND file <br>
						</p>
					</div>
				</div>
			</a>

			<a href="#" >
				<div class="w3-quarter">
					<div class="w3-card w3-container" style="min-height:300px">
						<h3>Type 3<br>(coming soon)</h3><br>
						<i class="w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
						<p style="text-align: left; font-weight: normal;">
							- Use gcards from web location.<br>
							- One set of jobs per gcard.  <br>
							- Container generator  <br>
							- Arbitrary number of jobs <br>
							- Arbitrary number of events for each job <br>
						</p>
					</div>
				</div>
			</a>

			<a href="#" >
				<div class="w3-quarter">
					<div class="w3-card w3-container" style="min-height:300px">
						<h3>Type 4<br>(coming soon)</h3><br>
						<i class="w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
						<p style="text-align: left; font-weight: normal;">
							- Use gcards from web location.<br>
							- One set of jobs per gcard.  <br>
							- Use LUND files from a web location<br>
							- One job per LUND file <br>
						</p>
					</div>
				</div>
			</a>
		</div>
	</body>
</html>
