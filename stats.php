<!DOCTYPE html>
<html>
<title> CLAS12 Offsite Farm Statistics </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<style>
body,h1,h2,h3 {font-family: "Raleway", Helvetica, sans-serif}
h1 {letter-spacing: 6px}
.w3-row-padding img {margin-bottom: 12px}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 10px;
}
</style>
<!-- Side Navigation -->
<nav class="w3-bar w3-border w3-sidebar w3-bar-block w3-card w3-center" style="display:none" id="mySidebar">
  <h2 class="w3-xxlarge w3-text-theme">Menus </h2>
  <button class="w3-button w3-display-topright w3-btn" onclick="w3_close()"> <i class="fa fa-remove"></i></button>
  <h4>
  <a href="index.php" class="w3-bar-item w3-button">Job Submission</a>
  <a href="#" class="w3-bar-item w3-button">Farm Statistics</a>
  <a href="https://github.com/mit-mc-clas12/documentation/blob/master/web_interface/web_interface.md" class="w3-bar-item w3-button">Documentation</a>
  <a href="https://clasweb.jlab.org/clas12/clas12SoftwarePage/html/index.html" class="w3-bar-item w3-button">Simulation Distribution</a>
  <a href="https://github.com/mit-mc-clas12/documentation/blob/master/web_interface/contacts.md" class="w3-bar-item w3-button">Contacts</a>
</h4>
</nav>

<!-- Header -->
<header class="w3-panel w3-opacity w3-container" id="top">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button"></i> 
  <div class="w3-center">
  <!-- <h4></h4> -->
  <h1 class="w3-xlarge">CLAS12 Monte-Carlo Job Submission Portal</h1>
  <div class=" w3-center w3-opacity w3-padding-32">
    <div class="w3-bar w3-border">
      <a href="#0" class="w3-bar-item w3-button w3-light-grey">Summary</a>
      <a href="#1" class="w3-bar-item w3-button">MIT Tier 2</a>
      <a href="#2" class="w3-bar-item w3-button w3-light-grey">OSG</a>
      <a href="#3" class="w3-bar-item w3-button">JLab</a>
      <a href="index.php" class="w3-bar-item w3-button">Job Submission</a>
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
        if ($fh = fopen('Sample_script_result', 'r')) {
                $line1 = fgets($fh);
                $t2_time = substr($line1, 11);
                $line2 = fgets($fh);
                $t2_total = substr($line2, 12);
                $line3 = fgets($fh);
                $t2_busy = substr($line3, 11);
                $line4 = fgets($fh);
                $t2_idle = substr($line4, 11);
            fclose($fh);
        }
        if ($fh = fopen('Sample_script_result_osg', 'r')) {
                $line1 = fgets($fh);
                $osg_time = substr($line1, 11);
                $line2 = fgets($fh);
                $osg_total= substr($line2, 12);
                $line3 = fgets($fh);
                $osg_busy = substr($line3, 11);
                $line4 = fgets($fh);
                $osg_idle = substr($line4, 11);
            fclose($fh);
        }
        if ($fh = fopen('Sample_script_result_jlab', 'r')) {
                $line1 = fgets($fh);
                $jlab_time = substr($line1, 11);
                $line2 = fgets($fh);
                $jlab_total= substr($line2, 12);
                $line3 = fgets($fh);
                $jlab_busy = substr($line3, 11);
                $line4 = fgets($fh);
                $jlab_idle = substr($line4, 11);
            fclose($fh);
        $username= $_SERVER['PHP_AUTH_USER'];
        }        
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
            <td> <?php echo nl2br($t2_total); ?> </td>
            <td> <?php echo nl2br($t2_busy); ?> </td>
            <td> <?php echo nl2br($t2_idle); ?> </td>
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
            <h1>MIT Tier 2</h1>
                <?php
                if ($fh = fopen('Sample_script_result', 'r')) {
                    while (!feof($fh)) {
                        $line = fgets($fh);
                        echo nl2br($line);
                    }
                    fclose($fh);
                }
              ?>
                <a href="http://submit.mit.edu/condormon/index.php">http://submit.mit.edu/condormon/index.php</a><br>
                <img src="http://submit.mit.edu/condormon/imgs/Total_2h.png" style="width:30%;">
                <img src="http://submit.mit.edu/condormon/imgs/Total_1d.png" style="width:30%;">
                <img src="http://submit.mit.edu/condormon/imgs/Total_1w.png" style="width:30%;">
        </p>
    </div>
    <div class="w3-rest" id="2">
        <p>
            <h1>OSG </h1>
                <?php
                    if ($fh = fopen('Sample_script_result_osg', 'r')) {
                        while (!feof($fh)) {
                            $line = fgets($fh);
                            echo nl2br($line);
                        }
                        fclose($fh);
                    }
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
                    if ($fh = fopen('Sample_script_result_jlab', 'r')) {
                        while (!feof($fh)) {
                            $line = fgets($fh);
                            echo nl2br($line);
                        }
                        fclose($fh);
                    }
                ?>
                <br>
                <a href="https://scicomp.jlab.org/scicomp/#/farmNodes">https://scicomp.jlab.org/scicomp/#/farmNodes</a><br>
                <a href="https://scicomp.jlab.org/ganglia/?r=hour&cs=&ce=&c=Scicomp+Misc&h=scosg16.jlab.org&tab=&vn=&mc=2&z=small&metric_group=ALLGROUPS">https://scicomp.jlab.org/ganglia/?r=hour&cs=&ce=&c=Scicomp+Misc&h=scosg16.jlab.org&tab=&vn=&mc=2&z=small&metric_group=ALLGROUPS</a>
        </p>
    </div>
  </div>

<!-- End Page Content -->
</div>

<!-- 
<hr>
<div class="w3-center">
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-theme">«</a>
     <a href="index.php" class="w3-bar-item w3-button w3-hover-theme">1</a>
      <a href="#" class="w3-bar-item w3-button w3-theme w3-hover-theme">2</a>
      <a href="https://github.com/mit-mc-clas12/documentation/blob/master/web_interface/web_interface.md" class="w3-bar-item w3-button w3-hover-theme">3</a>
      <a href="https://github.com/mit-mc-clas12/documentation/blob/master/web_interface/contacts.md" class="w3-bar-item w3-button w3-hover-theme">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-theme">»</a>
    </div>
  </div>
</div>
<br>
 -->
<br>
<br>
<hr>
<div class="w3-center">
  <a href="#top">Go to top</a>
</div>
</body>
<script>
// Side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "30%";
  x.style.height = "60%";
  x.style.fontSize = "40px";
  x.style.paddingTop = "0%";
  x.style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

</script>

</html>
