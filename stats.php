<!DOCTYPE html>
<html>
	<head>
		<title> CLAS12 Offsite Farm Statistics </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="main.css">
	</head>
	<body>

		<header class="w3-panel w3-opacity w3-container" id="top">
		    <ul id="nav">
		     	<li><a href="index.php">Home</a></li>
		     	<li><a href="about.html">About</a></li>
		    </ul>

			<div class="w3-center">
				<h1 class="w3-xlarge">CLAS12 Monte-Carlo Job Submission Portal</h1>
				<h2 class="w3-xlarge" style="width:73%;text-align:right">Logged in as <?php $username= $_SERVER['PHP_AUTH_USER']; echo($username); ?> <br>
				<div class=" w3-center w3-opacity w3-padding-32">
					<div class="w3-bar w3-border">
						<a href="#0" class="w3-bar-item w3-button w3-light-grey">Summary</a>
						<a href="#1" class="w3-bar-item w3-button">MIT Tier 2</a>
						<a href="#2" class="w3-bar-item w3-button w3-light-grey">OSG</a>
						<a href="#3" class="w3-bar-item w3-button">JLab</a>
					</div>
					<br>
				</div>
			</div>
		</header>

		<div class="w3-row-padding w3-rest" style="margin-bottom:5%;">
			<div class="w3-rest" id="0">
				<p>
					<h1>Summary</h1>
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

						$username= $_SERVER['PHP_AUTH_USER'];

					?>
					<table style="width:100%;text-align:center" align="center">
						<caption style="text-align:right" align="top">
							Logged in as <?php echo($username); ?> <br>
							Last Update: <?php echo nl2br($osg_time); ?>
						</caption>
						<tr>
							<th> Farm Name </th>
							<th> Total Available Cores </th>
							<th> Busy Cores </th>
							<th> Idle Cores </th>
						</tr>
						<tr>
							<td> MIT </td>
							<td> <?php echo nl2br($t3_total); ?> </td>
							<td> <?php echo nl2br($t3_busy); ?> </td>
							<td> <?php echo nl2br($t3_idle); ?> </td>
						</tr>
						<tr>
							<td> OSG </td>
							<td> <?php echo nl2br($osg_total); ?> </td>
							<td> <?php echo nl2br($osg_busy); ?> </td>
							<td> <?php echo nl2br($osg_idle); ?> </td>
						</tr>
						<tr>
							<td> JLab </td>
							<td> <?php echo nl2br($jlab_total); ?> </td>
							<td> <?php echo nl2br($jlab_busy); ?> </td>
							<td> <?php echo nl2br($jlab_idle); ?> </td>
						</tr>
					</table>
				</p>
			</div>

			<div class="w3-rest" id="1">
				<p>
					<h1>MIT Tier 3</h1>
					<?php
						echo nl2br($t3_line1);
						echo nl2br($t3_line2);
						echo nl2br($t3_line3);
						echo nl2br($t3_line4);
					?>
					<a href="http://submit.mit.edu/condormon/index.php">http://submit.mit.edu/condormon/index.php</a><br>
					<img src="http://submit.mit.edu/condormon/imgs/Total_2h.png" style="width:30%;">
					<img src="http://submit.mit.edu/condormon/imgs/Total_1d.png" style="width:30%;">
					<img src="http://submit.mit.edu/condormon/imgs/Total_1w.png" style="width:30%;">
				</p>
			</div>
			
			<!-- OSG -->
			<div class="w3-rest" id="2">
				<p>
					<h1>OSG </h1>
					<?php
						echo nl2br($osg_line1);
						echo nl2br($osg_line2);
						echo nl2br($osg_line3);
						echo nl2br($osg_line4);
					?>
					<a href="https://display.opensciencegrid.org">https://display.opensciencegrid.org</a>
					<h2>Jobs </h2>
						<img src="https://display.opensciencegrid.org/osg_display/jobs_hourly.png" style="width:30%;">
						<img src="https://display.opensciencegrid.org/osg_display/jobs_daily.png" style="width:30%;">
						<img src="https://display.opensciencegrid.org/osg_display/jobs_monthly.png" style="width:30%;">
					<h2>CPU Time </h2>
						<img src="https://display.opensciencegrid.org/osg_display/cpu_hours_hourly.png" style="width:30%;">
						<img src="https://display.opensciencegrid.org/osg_display/cpu_hours_daily.png" style="width:30%;">
						<img src="https://display.opensciencegrid.org/osg_display/cpu_hours_monthly.png" style="width:30%;">
					<h2>Transfers </h2>
						<img src="https://display.opensciencegrid.org/osg_display/transfers_hourly.png" style="width:30%;">
						<img src="https://display.opensciencegrid.org/osg_display/transfers_daily.png" style="width:30%;">
						<img src="https://display.opensciencegrid.org/osg_display/transfers_monthly.png" style="width:30%;">
					<h2>Transfer Volume</h2>
						<img src="https://display.opensciencegrid.org/osg_display/transfer_volume_hourly.png" style="width:30%;">
						<img src="https://display.opensciencegrid.org/osg_display/transfer_volume_daily.png" style="width:30%;">
							<img src="https://display.opensciencegrid.org/osg_display/transfer_volume_monthly.png" style="width:30%;">
				</p>
			</div>

			<div class="w3-rest" id="3">
				<p>
					<h1>JLab</h1>
					<?php
						echo nl2br($jlab_line1);
						echo nl2br($jlab_line2);
						echo nl2br($jlab_line3);
						echo nl2br($jlab_line4);
					?>
					<br>
					<a href="https://scicomp.jlab.org/scicomp/#/farmNodes">https://scicomp.jlab.org/scicomp/#/farmNodes</a><br>
					<a href="https://scicomp.jlab.org/ganglia/?r=hour&cs=&ce=&c=Scicomp+Misc&h=scosg16.jlab.org&tab=&vn=&mc=2&z=small&metric_group=ALLGROUPS">https://scicomp.jlab.org/ganglia/?r=hour&cs=&ce=&c=Scicomp+Misc&h=scosg16.jlab.org&tab=&vn=&mc=2&z=small&metric_group=ALLGROUPS</a>
				</p>
			</div>
		</div>
		<br>
		<br>
		<hr>
		<div class="w3-center">
			<a href="#top">Go to top</a>
		</div>
	</body>

	<script src="main.js">	</script>

	
</html>
