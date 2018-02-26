
<html>
<head></head>
<body>
    <form method="post" action="">
    Scan Type: <select name="actions">
                  <option value="1">Scan Single IP</option>
                  <option value="2">Scan Host</option>
                  <option value="3">Scan Range Of IP</option>
                  <option value="4">Scan IP from File</option>
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
//header("Cache-Control: no-cache"); //set http headers to prevent caching
//header("Pragma: no-cache");//set http headers to prevent caching

if(isset($_POST['submit'])){
$ip = $_POST['ip_address'];
$command = $_POST['actions'];


if ( $command == 1)
{
    $cmd = 'nmap '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//Scan Single IP
    echo "<pre>$res</pre>";
}
else if ($command == 2) {
    $cmd = 'nmap '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//scan host
    echo "<pre>$res</pre>";
}
else if ($command == 3){
    $cmd = 'nmap '.$ip.'-255';
    echo $cmd;
    $res = shell_exec($cmd);//scan range of ip
    echo "<pre>$res</pre>";

}
else{
    $cmd = 'nmap -iL list-of-ip.txt';
    echo $cmd;
    $res = shell_exec($cmd);//scan IP from file
    echo "<pre>$res</pre>";
}

}

?>