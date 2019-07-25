    <?php
    $rungroup = $_POST['rungroup'];
    $farm = $_POST['farm'];
    $nevents = $_POST['nevents'];
    $generator = $_POST['generator'];
    $jobs = $_POST['jobs'];
    $lumi = $_POST['lumi'];
    $tcurrent = $_POST['tcurrent'];
    $pcurrent = $_POST['pcurrent'];
    $cores = $_POST['cores'];
    $ram = $_POST['ram'];
    if (!empty($rungroup) || !empty($farm) || !empty($nevents) || !empty($generator) || !empty($jobs) || !empty($lumi) || !empty($tcurrent) || !empty($pcurrent) || !empty($cores) || !empty($ram)) {
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "test";
        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()) {
         die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
         $SELECT = "SELECT farm From submit Where farm = ? Limit 1";
         $INSERT = "INSERT Into submit (rungroup, farm, nevents, generator, jobs, lumi, tcurrent, pcurrent, cores, ram) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         //Prepare statement
         $stmt = $conn->prepare($SELECT);
         $stmt->bind_param("s", $farm);
         $stmt->execute();
         $stmt->bind_result($farm);
         $stmt->store_result();
         $rnum = $stmt->num_rows;
         if ($rnum==0) {
          $stmt->close();
          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("ssisiiiiii", $rungroup, $farm, $nevents, $generator, $jobs, $lumi, $tcurrent, $pcurrent, $cores, $ram);
          $stmt->execute();
          echo "New record inserted sucessfully";
         } else {
          echo "Someone already registered using this generator";
         }
         $stmt->close();
         $conn->close();
        }
    } else {
     echo "All field are required";
     die();
    }
    ?>