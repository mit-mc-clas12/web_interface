# Some scripts for CLAS12 Monte-Carlo Job Submission Portal

We start from very simple php scripts for displaying farm statistics and letting clients submit jobs.

## What do we need?
- Server
- Server side web programming skills (i.e. php)

## What do we expect server?

- apache, to handle both client and server side programming, i.e. js and php
- Write permission for pushing some text

# Python modules needed on the server:

- python3-pip installed
- pip install fs
- python3-mysqlclient installed
- numpy

# How to practice php scripting


Debugging:

Add this on top:

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


If PHP-FPM:

Tell Apache to pass the auth headers to PHP-FPM
In the Apache config (vhost or .conf that applies to this site), add:

SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1

or, on some setups:

CGIPassAuth On

Then reload Apache.

Debugging php form writing:

echo "<pre>";
echo "PHP running as UID: " . getmyuid() . "\n";
echo "PHP running as GID: " . getmygid() . "\n";
echo "Effective user: " . get_current_user() . "\n";
echo "File owner of current script: " . fileowner(__FILE__) . "\n";
echo "File group of current script: " . filegroup(__FILE__) . "\n";
echo "</pre>";

                                        $fp = fopen('/var/www/gemc-runtime/scard_type1.txt', 'w');



if (!function_exists('posix_geteuid')) {
    echo "<pre>posix_* functions not available</pre>";
} else {
    echo "<pre>";
    echo "geteuid: " . posix_geteuid() . " (" . posix_getpwuid(posix_geteuid())['name'] . ")\n";
    echo "getegid: " . posix_getegid() . " (" . posix_getgrgid(posix_getegid())['name'] . ")\n";
    echo "</pre>";
}



## Having server


In the server, ungaro (2 factors) has root priviledges:  sudo bash


Any php script will use php extension.
Without a server, php scripts cannot be converted to html at client side.
So php can't run at public_html environment.

So if we want to test php scripts, assuming we have proper permission at server environment, we can use local server such as XAMPP.

### PHP on mac:

After brew installation with brew install php

 php -S localhost:9000
 
 (in the same dir as index.pho)
 
 then open browser at http://localhost:9000

## How to play with XAMPP

Instruction for XAMPP is straightforward for Mac OSX at [Webucator](https://www.webucator.com/how-to/how-install-start-test-xampp-on-mac-osx.cfm). I assume it can apply for Windows and Linux too. You can follow the former link or either next instruction.

* Install XAMPP from [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html)
* Run XAMPP, you can find at /Applications/XAMPP/manager-osx.app for osx. 
* Start apache at "Manage Servers" tab
* At terminal execute following command for mysql permission
```chmod -R 777 /Applications/XAMPP/xamppfiles/var ```
* Go to [http://localhost](http://localhost) at your web browser for a test if XAMPP runs now.
* ```cd \Applications\XAMPP\xamppfiles\htdocs\ ``` (or htdocs directory for Windows and Linux)
* ```git clone https://github.com/mit-mc-clas12/web_interface```
* Go to [http://localhost/web_interface/](http://localhost/web_interface/) to browse files
* Click php files or html files for browsing them (e.g. sample.php and sample.html. See the bottom.)
* Make your own.

# Syntax for php and javascript

php scripts looks similar to http's, but with some scripting codes in the middle of files.
Here' s a very nice tutorial for php scripts [https://www.w3schools.com/php/](https://www.w3schools.com/php/)
Syntax for javascript is also at [https://www.w3schools.com/js/](https://www.w3schools.com/js/)

## Examples

Please look at sample.html for javascript and sample.php for php.
sample.php shows how to execute python script at php and pass variable to javascript.
