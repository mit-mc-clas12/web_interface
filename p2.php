<!DOCTYPE html>
<html>
<title> Sample php files </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

<header class="w3-panel w3-center w3-opacity" style="padding:128px 16px">
  <h1 class="w3-xlarge">CLAS12 Monte-Carlo Job Submission Portal</h1>

  <div class="w3-padding-32">
    <div class="w3-bar w3-border">
      <a href="#0" class="w3-bar-item w3-button w3-light-grey">Summary</a>
      <a href="#1" class="w3-bar-item w3-button">MIT Tier 2</a>
      <a href="#2" class="w3-bar-item w3-button w3-light-grey">OSG</a>
      <a href="#3" class="w3-bar-item w3-button">JLab</a>
      <a href="submit.html" class="w3-bar-item w3-button">Job Submission</a>
    </div>
    <br>
  </div>
</header>

  <div class="w3-row-padding" style="margin-bottom:128px;">
    <div class="w3-content" id="0">
      <p>
        <h1>Summary</h1>
        <?php
        if ($fh = fopen('Sample_script_result', 'r')) {
                $line1 = fgets($fh);
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
                $line2 = fgets($fh);
                $osg_total= substr($line2, 12);
                $line3 = fgets($fh);
                $osg_busy = substr($line3, 11);
                $line4 = fgets($fh);
                $osg_idle = substr($line4, 11);
            fclose($fh);
        }
      ?>
        <table style="width:100%;text-align:center">
          <tr>
            <th> Farm Name </th>
            <th> Total Available Nodes </th>
            <th> Busy Nodes </th>
            <th> Idle Nodes </th>
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

        </table>
    </p>
    </div>


    <div class="w3-content" id="1">
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
                <img src="http://submit.mit.edu/condormon/imgs/Total_2h.png" width = 400px>
                <img src="http://submit.mit.edu/condormon/imgs/Total_1d.png" width = 400px>
                <img src="http://submit.mit.edu/condormon/imgs/Total_1w.png" width = 400px>
        </p>
    </div>
    <div class="w3-content" id="2">
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
                 <img src="https://display.opensciencegrid.org/osg_display/jobs_hourly.png" width=400px>
                 <img src="https://display.opensciencegrid.org/osg_display/jobs_daily.png" width=400px>
                 <img src="https://display.opensciencegrid.org/osg_display/jobs_monthly.png" width=400px>
                <h2>CPU Time </h2>
                 <img src="https://display.opensciencegrid.org/osg_display/cpu_hours_hourly.png" width=400px>
                 <img src="https://display.opensciencegrid.org/osg_display/cpu_hours_daily.png" width=400px>
                 <img src="https://display.opensciencegrid.org/osg_display/cpu_hours_monthly.png" width=400px>  
                <h2>Transfers </h2>
                 <img src="https://display.opensciencegrid.org/osg_display/transfers_hourly.png" width=400px>
                 <img src="https://display.opensciencegrid.org/osg_display/transfers_daily.png" width=400px>
                 <img src="https://display.opensciencegrid.org/osg_display/transfers_monthly.png" width=400px>  
                <h2>Transfer Volume</h2>
                 <img src="https://display.opensciencegrid.org/osg_display/transfer_volume_hourly.png" width=400px>
                 <img src="https://display.opensciencegrid.org/osg_display/transfer_volume_daily.png" width=400px>
                 <img src="https://display.opensciencegrid.org/osg_display/transfer_volume_monthly.png" width=400px>
        </p>
    </div>
    <div class="w3-content" id="3">
        <p>
                <h1>JLab</h1>
                <a href="https://scicomp.jlab.org/scicomp/#/farmNodes">https://scicomp.jlab.org/scicomp/#/farmNodes</a><br>
                <a href="https://scicomp.jlab.org/ganglia/?r=hour&cs=&ce=&c=Scicomp+Misc&h=scosg16.jlab.org&tab=&vn=&mc=2&z=small&metric_group=ALLGROUPS">https://scicomp.jlab.org/ganglia/?r=hour&cs=&ce=&c=Scicomp+Misc&h=scosg16.jlab.org&tab=&vn=&mc=2&z=small&metric_group=ALLGROUPS</a>
        </p>
    </div>
  </div>

<!-- End Page Content -->
</div>


</body>
</html>
