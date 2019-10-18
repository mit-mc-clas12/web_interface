<!DOCTYPE html>
<html>
  <head>
    <title>CLAS12 Monte-Carlo Job Submission Portal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <!-- Header -->
    <header class="w3-panel w3-opacity w3-container" id="myHeader">
      <ul id="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="https://github.com/mit-mc-clas12/documentation/blob/master/web_interface/web_interface.md">About</a></li>
        <li><a href="stats.php">Farm Statistics</a></li>
        <li><a href="https://github.com/mit-mc-clas12/documentation/blob/master/web_interface/contacts.md">Contact</a></li>
      </ul>

      <div class="w3-center">
      <!-- <h4></h4> -->
        <h1 class="w3-xlarge">CLAS12 Monte-Carlo Job Submission Portal</h1>
          <h2 class="w3-xlarge">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logged in as <?php $username= $_SERVER['PHP_AUTH_USER']; echo($username); ?> <br>
      </div>
    </header>

    <div class="w3-center">

      <?php
        $project = $_POST['project'];
        $rungroup = $_POST['rungroup'];
        $farm = $_POST['farm'];
        $generator = $_POST['generator'];
        $gcards = $_POST['gcards'];
        $nevents = $_POST['nevents'];
        $genOptions = $_POST['genOptions'];
        $lumi = $_POST['lumi'];
        $tcurrent = $_POST['tcurrent'];
        $pcurrent = $_POST['pcurrent'];
        $cores = $_POST['cores'];
        $ram = $_POST['ram'];
        $jobs = $_POST['jobs'];
        $totalevents = $_POST['totalevents'];
        $username = $_SERVER['PHP_AUTH_USER'];
        if (!empty($genOptions) ||!empty($project) || !empty($gcards) || !empty($rungroup) || !empty($farm) || !empty($nevents) || !empty($generator) || !empty($jobs) || !empty($lumi) || !empty($tcurrent) || !empty($pcurrent) || !empty($cores) || !empty($ram)) {
                $fp = fopen('scard_type1.txt', 'w');
                fwrite($fp, 'project: CLAS12  # project name'.PHP_EOL);
                fwrite($fp, 'group: '.$rungroup.'   # project description'.PHP_EOL);
                fwrite($fp, 'farm_name: '.$farm.' # farm pool'.PHP_EOL);
                fwrite($fp, 'generator: '.$generator.'  # one of clasdis, dvcs, disrad. Alternatively, the online public accessible location of user lund files.'.PHP_EOL);
                fwrite($fp, 'gcards: '.$gcards.'    # gcard, or online public accessible location of user gcards. If online address, there will be a submission for each gcard at that address'.PHP_EOL);
                fwrite($fp, 'nevents: '.$nevents.'  # run 100 events, this include the generator'.PHP_EOL);
                fwrite($fp, 'genOptions: '.$genOptions.'    # clasdis options: theta between 10 and 15 degrees'.PHP_EOL);
                fwrite($fp, 'luminosity: '.$lumi.'  # percent of 10^35 luminosity'.PHP_EOL);
                fwrite($fp, 'tcurrent: '.$tcurrent.'    # torus field scale'.PHP_EOL);
                fwrite($fp, 'pcurrent: '.$pcurrent.'    # solenoid field scale'.PHP_EOL);
                fwrite($fp, 'cores_req: 1 # number of cores to request from node'.PHP_EOL);
                fwrite($fp, 'mem_req: 2 # GB of RAM to request from node.'.PHP_EOL);
                fwrite($fp, 'jobs: '.$jobs.'    # number of jobs for each submission. This entry is ignored if lund files are used. In that case, theres is exactly one job / file'.PHP_EOL);
                fclose($fp);
                $command = escapeshellcmd('../SubMit/client/src/SubMit.py -u '.$username.' scard_type1.txt');
                $output = shell_exec($command);
            }
        else {
         echo "All field are required";
         die();
        }
      ?>

      Your job was successfully submitted! (Type 1)
      <table style="text-align: center;width: 50%;"align="center">
        <tr>
          <td>Project</td>
          <td>CLAS12</td>
        </tr>
        <tr>
          <td>Tag</td>
          <td> <?php echo($rungroup); ?>  </td>
        <!--     <td>
              <div class="tooltip">What is this?
                <span class="tooltiptext">Lorem ipsum</span>
              </div>
            </td>
         -->
        </tr>
        <tr>
          <td>      
    <!--       <div class="tooltip">Farm
            <span class="tooltiptext">Lorem ipsum</span>
          </div>
     -->    
            Farm
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
          <td>Gcards</td>
          <td>
              <?php echo($gcards); ?>
          </td>
        </tr>
        <tr>
          <td>Generator Options</td>
          <td>
           <?php echo($genOptions); ?>
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
          <td>Cores requested</td>
          <td>1</td>
        </tr>
        <tr>
          <td>RAM requested</td>
          <td>2 GB</td>
        </tr>
        <tr>
          <td>Number of Jobs</td>
          <td><?php echo($jobs); ?></td>
        </tr>
        <tr>
          <td>Number of Events / Job</td>
          <td><?php echo($nevents); ?></td>
        </tr>
        <tr>
          <td> Total Events </td>
          <td><?php echo($totalevents); ?></td>
        </tr>
      </table>
    </div>

  </body>

  <script src="main.js">
  </script>
</html>
