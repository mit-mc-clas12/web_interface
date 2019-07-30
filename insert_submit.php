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
    if (!empty($genOptions) ||!empty($project) || !empty($gcards) || !empty($rungroup) || !empty($farm) || !empty($nevents) || !empty($generator) || !empty($jobs) || !empty($lumi) || !empty($tcurrent) || !empty($pcurrent) || !empty($cores) || !empty($ram)) {
            $fp = fopen('scard_type1.txt', 'w');
            fwrite($fp, 'project: '.$project.PHP_EOL);
            fwrite($fp, 'group: '.$rungroup.PHP_EOL);
            fwrite($fp, 'farm_name: '.$farm.PHP_EOL);
            fwrite($fp, 'generator: '.$generator.PHP_EOL);
            fwrite($fp, 'gcards: '.$gcards.PHP_EOL);
            fwrite($fp, 'nevents: '.$nevents.PHP_EOL);
            fwrite($fp, 'genOptions: '.$genOptions.PHP_EOL);
            fwrite($fp, 'luminosity: '.$lumi.PHP_EOL);
            fwrite($fp, 'tcurrent: '.$tcurrent.PHP_EOL);
            fwrite($fp, 'pcurrent: '.$pcurrent.PHP_EOL);
            fwrite($fp, 'cores_req: '.$cores.PHP_EOL);
            fwrite($fp, 'mem_req'.$ram.PHP_EOL);
            fwrite($fp, 'jobs: '.$jobs.PHP_EOL);
            fclose($fp);
        }
    else {
     echo "All field are required";
     die();
    }
    ?>