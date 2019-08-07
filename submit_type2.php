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
    if (!empty($genOptions) ||!empty($project) || !empty($gcards) || !empty($rungroup) || !empty($farm) || !empty($nevents) || !empty($generator) || !empty($jobs) || !empty($lumi) || !empty($tcurrent) || !empty($pcurrent) || !empty($cores) || !empty($ram)) {
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
        }
    else {
     echo "All field are required";
     die();
    }
    ?>