<!DOCTYPE html>
<html>
<title> Sample php files </title>
<body>

<?php
    $command = escapeshellcmd('python helloworld.py');
    $output = shell_exec($command);
	$fp = fopen('/Applications/XAMPP/xamppfiles/htdocs/Sample/text.txt', 'a+');
	fwrite($fp, $output);
	fclose($fp);
?>
</body>
</html>