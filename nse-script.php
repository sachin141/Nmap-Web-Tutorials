<html>
<head></head>
<body>
    <form method="post" action="">
    Scan Type: <select name="actions">
                  <option value="1">Scan using default safe scripts</option>
                  <option value="2">Get help for a script</option>
                  <option value="3">Scan using a specific NSE script</option>
                  <option value="4">Scan with a set of scripts</option>
                </select>
    IP Address/Host:<input type="text" name="ip_address">
    <input type="submit" name="submit" />
    </form>
</body>
</html>
<?php 

ini_set('zlib.output_compression', false);// Turn off PHP output compression
while (@ob_end_flush());//Flush (send) the output buffer and turn off output buffering
ini_set('implicit_flush', true);// Implicitly flush the buffer(s)
ob_implicit_flush(true);// Implicitly flush the buffer(s)
set_time_limit(0);//Set this so PHP doesn't timeout during a long stream 

if(isset($_POST['submit'])){
$ip = $_POST['ip_address'];
$command = $_POST['actions'];


if ( $command == 1)
{
    $cmd = 'nmap -sV -sC '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//Scan using default safe scripts
    echo "<pre>$res</pre>";
}
else if ($command == 2) {
    $cmd = 'nmap --script-help=ssl-heartbleed';
    echo $cmd;
    $res = shell_exec($cmd);//Get help for a script
    echo "<pre>$res</pre>";
}
else if ($command == 3){
    $cmd = 'nmap -sV -p 443 –script=ssl-heartbleed.nse '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//Scan using a specific NSE script
    echo "<pre>$res</pre>";

}

else{
    $cmd = 'nmap -sV --script=smb* '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//Scan with a set of scripts
    echo "<pre>$res</pre>";
}

}
?>