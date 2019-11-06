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
		<script src="main.js">	</script>

	</head>
	<body onload='osgLogtoTable()'>
		<!-- Header -->
		<header class="w3-panel w3-opacity w3-container" id="myHeader">
			
			<ul id="nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="osgStats.html">OSG Stats</a></li>
			</ul>

			<div class="w3-center">
				<h1 class="w3-xlarge">CLAS12 Monte-Carlo Job Submission Portal</h1>
				<h2 class="w3-xlarge" style="width:73%;text-align:right">Logged in as <?php $username= $_SERVER['PHP_AUTH_USER']; echo($username); ?> <br>
				</h2>

				<div class="w3-padding w3-center">
					<?php
						if ($fh = fopen('stats_results/Sample_script_result', 'r')) {
							$t3_line1 = fgets($fh);
							$t3_time = substr($t3_line1, 11);
							$t3_line2 = fgets($fh);
							$t3_total = substr($t3_line2, 12);
							$t3_line3 = fgets($fh);
							$t3_busy = substr($t3_line3, 11);
							$t3_line4 = fgets($fh);
							$t3_idle = substr($t3_line4, 11);
							fclose($fh);
						}
						if ($fh = fopen('stats_results/Sample_script_result_osg', 'r')) {
							$osg_line1 = fgets($fh);
							$osg_time = substr($osg_line1, 11);
							$osg_line2 = fgets($fh);
							$osg_total= substr($osg_line2, 12);
							$osg_line3 = fgets($fh);
							$osg_busy = substr($osg_line3, 11);
							$osg_line4 = fgets($fh);
							$osg_idle = substr($osg_line4, 11);
							fclose($fh);
						}
						if ($fh = fopen('stats_results/Sample_script_result_jlab', 'r')) {
							$jlab_line1 = fgets($fh);
							$jlab_time = substr($jlab_line1, 11);
							$jlab_line2 = fgets($fh);
							$jlab_total= substr($jlab_line2, 12);
							$jlab_line3 = fgets($fh);
							$jlab_busy = substr($jlab_line3, 11);
							$jlab_line4 = fgets($fh);
							$jlab_idle = substr($jlab_line4, 11);
							fclose($fh);
						}
					?>

					<br><br>

					<table style="width:100%;text-align:center">
						<caption style="text-align:right" align="top">
							Last Update: <?php echo nl2br($osg_time); ?>
						</caption>
						<tr>
							<th> Farm Name </th>
							<th> Total Available Cores </th>
							<th> Busy Cores </th>
							<th> Idle Cores </th>
						</tr>
<!--
						<tr>
							<td> MIT </td>
							<td> <?php echo nl2br($t3_total); ?> </td>
							<td> <?php echo nl2br($t3_busy); ?> </td>
							<td> <?php echo nl2br($t3_idle); ?> </td>
						</tr>
-->
						<tr>
							<td> OSG </td>
							<td> <?php echo nl2br($osg_total); ?> </td>
							<td> <?php echo nl2br($osg_busy); ?> </td>
							<td> <?php echo nl2br($osg_idle); ?> </td>
						</tr>
<!--
						<tr>
							<td> JLab </td>
							<td> <?php echo nl2br($jlab_total); ?> </td>
							<td> <?php echo nl2br($jlab_busy); ?> </td>
							<td> <?php echo nl2br($jlab_idle); ?> </td>
						</tr>
-->

					</table>

					<br>
					<br>
					<div id="osgLog"></div>

				</div>
			</div>
		</header>

		<div class="w3-row-padding w3-center w3-margin-top">
			<a href="type1.html" >
				<div class="w3-quarter">
					<div class="w3-card w3-container" style="min-height:380px">
						<h3>Type 1</h3><br>
						<i class="w3-margin-bottom w3-text-theme" style="font-size:120px;"></i>
						<p style="text-align: left">
							- Container CLAS12 gcard <br>
							- Container or gemc internal generator <br>
							- Arbitrary number of jobs <br>
							- Arbitrary number of events for each job <br>
						</p>
					</div>
				</div>
			</a>

			<a href="type2.html" >
				<div class="w3-quarter">
					<div class="w3-card w3-container" style="min-height:380px">
						<h3>Type 2</h3><br>
						<i class="w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
						<p style="text-align: left">
							- Container CLAS12 gcard <br>
							- Use LUND files from a web location or directory in /volatile <br>
							- One job per LUND file <br>
						</p>
					</div>
				</div>
			</a>

			<a href="#" >
				<div class="w3-quarter">
					<div class="w3-card w3-container" style="min-height:380px">
						<h3>Type 3</h3><br>
						<i class="w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
						<p style="text-align: left">
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
					<div class="w3-card w3-container" style="min-height:380px">
						<h3>Type 4</h3><br>
						<i class="w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
						<p style="text-align: left">
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
