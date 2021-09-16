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
	</head>

	<body>
		<header class="w3-panel w3-opacity w3-container" id="myHeader">
			<ul id="nav">
				<li><a href="index.php">     Home</a></li>
				<li><a href="about.html">    About</a></li>
				<li><a href="disk.php">      Disk Usage</a></li>
				<li><a href="osgStats.html"> OSG Stats</a></li>
			</ul>

			<div class="w3-center">
				<h1 id="title" class="w3-xlarge w3-opacity"></h1>
				<h2 class="w3-xlarge" style="text-align:center">Logged in as <img width = "160" src="username.php"/></h2>
				<br/><br/>
			</div>
		</header>

		<div class="w3-center">
			
			<?php
				$project     = 'CLAS12';
				$configuration      = $_POST['configuration'];
				$lundFiles   = $_POST['lundFiles'];
				$username    = $_SERVER['PHP_AUTH_USER'];
				$client_ip   = $_SERVER['REMOTE_ADDR'];
				$fields		 = $_POST['fields'];
				$bkmerging = $_POST['bkmerging'];
				$uri		 = $_SERVER['REQUEST_URI'];
				
				function yesorno($cond){
					$val = "no";
					if($cond) $val="yes";
					return $val;
				}

				if (!empty($project) && !empty($configuration)  && !empty($lundFiles) && !empty($fields)&& !empty($bkmerging)) {
					$fp = fopen('scard_type2.txt', 'w');
					fwrite($fp, 'project:  '.$project.PHP_EOL);
					fwrite($fp, 'configuration: '.$configuration.PHP_EOL);
					fwrite($fp, 'generator: '.$lundFiles.PHP_EOL);
					fwrite($fp, 'client_ip: '.$client_ip.PHP_EOL);
					fwrite($fp, 'dstOUT: yes'.PHP_EOL);
					fwrite($fp, 'fields: '.$fields.PHP_EOL);
					fwrite($fp, 'bkmerging: '.$bkmerging.PHP_EOL);
					if (strpos($uri, 'test/web_interface') !== false) {
						fwrite($fp, 'submission: devel'.PHP_EOL);
					} else {
						fwrite($fp, 'submission: production'.PHP_EOL);
					}
					fclose($fp);
					if (strpos($uri, 'test/web_interface') !== false) {
						$command = escapeshellcmd('../SubMit/client/src/SubMit.py --test_database -u '.$username.' scard_type2.txt');
						$output = shell_exec($command);
					} else {
						$command = escapeshellcmd('../SubMit/client/src/SubMit.py -u '.$username.' scard_type2.txt');
						$output = shell_exec($command);
					}
				}
				else {
					echo "All field are required";
					die();
				}
			?>


			<h4>Your job was successfully submitted with the following parameters.</h4>
			<table style="text-align: center;width: 50%;"align="center">
				<tr>
					<td>Project</td>
					<td> <?php echo($project); ?> </td>
				</tr>
				<tr>
					<td>Configuration</td>
					<td><?php echo($configuration); ?></td>
				</tr>
				<tr>
					<td>Lund File Location</td>
					<td> <?php echo($lundFiles); ?> </td>
				</tr>
				<tr>
					<td> Fields: </td>
					<td><?php echo($fields); ?> M</td>
				</tr>
				<tr>
					<td> Background Merging </td>
					<td> <?php echo($bkmerging); ?> M</td>
				</tr>
						
			</table>
			<h4>Output is synced hourly at /lustre/expphy/volatile/clas12/osg2/<?php echo($username); ?>.</h4>
		</div>
	</body>

	<script src="main.js"></script>		<!-- Don't move this line to the top! It causes an error at Safari -->

</html>
