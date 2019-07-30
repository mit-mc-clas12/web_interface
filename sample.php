<!DOCTYPE html>
<html>
<title> Sample php files </title>
<body>

<?php
    $command = escapeshellcmd('python helloworld.py');
    $output = shell_exec($command);
	// $fp = fopen('/Applications/XAMPP/xamppfiles/htdocs/Sample/text.txt', 'a+');
	// fwrite($fp, $output);
	// fclose($fp);  
	echo ("This is from php. <br>");
	echo ($output);
?>

<br>
<br>
This is from javascript.
<div id="demo"> </div>

<script> 
  document.getElementById("demo").innerHTML = "<?php echo substr_replace($output,"",-1); ?>"; 
</script> 

<br>

<?php
$fp = fopen('lidn.txt', 'w');
fwrite($fp, 'Cats chase mice');
fclose($fp);
?>

</body>
</html>