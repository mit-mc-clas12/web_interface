<!DOCTYPE html>
<html>
<title>CLAS12 Monte-Carlo Job Submission Portal</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<style>
body,h1,h2,h3,h4 {font-family: "Raleway", Helvetica, sans-serif}
h1 {letter-spacing: 6px}
.w3-row-padding img {margin-bottom: 12px}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 10px;
}
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

</style>

<nav class="w3-bar w3-border w3-sidebar w3-bar-block w3-card w3-center" style="display:none" id="mySidebar">
  <h2 class="w3-xxlarge w3-text-theme">Menus </h2>
  <button class="w3-button w3-display-topright w3-btn" onclick="w3_close()"> <i class="fa fa-remove"></i></button>
  <h4>
  <a href="p1.php" class="w3-bar-item w3-button">Job Submission</a>
  <a href="p2.php" class="w3-bar-item w3-button">Farm Statistics</a>
  <a href="https://github.com/mit-mc-clas12/documentation" class="w3-bar-item w3-button">Documentation</a>
  <a href="#" class="w3-bar-item w3-button">Contacts</a>
</h4>
</nav>

<!-- Header -->
<header class="w3-panel w3-opacity w3-container" id="myHeader">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button"></i> 
  <div class="w3-center">
  <!-- <h4></h4> -->
  <h1 class="w3-xlarge">CLAS12 Monte-Carlo Job Submission Portal</h1>
    <br>
  </div>
  </div>
</header>

    <?php
    $project = $_POST['project'];
    $rungroup = $_POST['rungroup'];
    $farm = $_POST['farm'];
    $generator = $_POST['generator'];
    $gcards = $_POST['gcards'];
    $lumi = $_POST['lumi'];
    $tcurrent = $_POST['tcurrent'];
    $pcurrent = $_POST['pcurrent'];
    $cores = $_POST['cores'];
    $ram = $_POST['ram'];
    if (!empty($project) || !empty($gcards) || !empty($rungroup) || !empty($farm) || !empty($generator) || !empty($lumi) || !empty($tcurrent) || !empty($pcurrent) || !empty($cores) || !empty($ram)) {
            $fp = fopen('scard_type2.txt', 'w');
            fwrite($fp, 'project: '.$project.'  # project name'.PHP_EOL);
            fwrite($fp, 'group: '.$rungroup.'   # project description'.PHP_EOL);
            fwrite($fp, 'farm_name: '.$farm.' # farm pool'.PHP_EOL);
            fwrite($fp, 'generator: '.$generator.'  # one of clasdis, dvcs, disrad. Alternatively, the online public accessible location of user lund files.'.PHP_EOL);
            fwrite($fp, 'gcards: '.$gcards.'    # gcard, or online public accessible location of user gcards. If online address, there will be a submission for each gcard at that address'.PHP_EOL);
            fwrite($fp, 'luminosity: '.$lumi.'  # percent of 10^35 luminosity'.PHP_EOL);
            fwrite($fp, 'tcurrent: '.$tcurrent.'    # torus field scale'.PHP_EOL);
            fwrite($fp, 'pcurrent: '.$pcurrent.'    # solenoid field scale'.PHP_EOL);
            fwrite($fp, 'cores_req: '.$cores.'  # number of cores to request from node'.PHP_EOL);
            fwrite($fp, 'mem_req: '.$ram.'  # GB of RAM to request from node.'.PHP_EOL);
            fclose($fp);
            $command = escapeshellcmd('/group/clas12/SubMit/client/src/SubMit.py scard_type2.txt');
            $output = shell_exec($command);            
        }
    else {
     echo "All field are required";
     die();
    }
?>


<div class="w3-center">
<h4>Your job was successfully submitted! (Type 2) (Command: <?php echo($output); ?>)</h4>
 <table align="center">
   <tr>
    <td>Project</td>
    <td>
      <?php echo($project); ?>
    </td>
  </tr>
  <tr>
    <td>Group</td>
    <td>
        <?php echo($rungroup); ?>
    </td>
    <td>
      <div class="tooltip">What is this?
        <span class="tooltiptext">Lorem ipsum</span>
      </div>
    </td>
   </tr>
   <tr>
    <td>      
      <div class="tooltip">Farm
        <span class="tooltiptext">Lorem ipsum</span>
      </div>
    </td>
    <td>
        <?php echo($farm); ?>
    </td>
   </tr>
   <tr>
    <td>Generator</td>
    <td>
        <?php echo($generator); ?>
    </td>
   </tr>
   <tr>
    <td>gcards</td>
    <td>
        <?php echo($gcards); ?>
    </td>
  </tr>
   <tr>
    <td>Luminosity (percent of 10<sup>23</sup> cm<sup>-2</sup> s<sup>-1</sup>):</td>
    <td><?php echo($lumi); ?></td>
   </tr>
   <tr>
    <td>Torus current</td>
    <td><?php echo($tcurrent); ?> </td>
   </tr>
   <tr>
    <td>Solenoid current</td>
    <td><?php echo($pcurrent); ?> </td>
   </tr>
   <tr>
    <td>Cores request</td>
    <td><?php echo($cores); ?></td>
   </tr>
   <tr>
    <td>RAM request</td>
    <td><?php echo($ram); ?> GB</td>
   </tr>
  </table>
</div>

</body>

<script>
// Side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "30%";
  x.style.height = "50%";
  x.style.fontSize = "40px";
  x.style.paddingTop = "0%";
  x.style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

</script>

</html>