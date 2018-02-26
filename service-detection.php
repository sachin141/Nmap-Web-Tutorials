
<html>
<head></head>
<body>
    <form method="post" action="">
    Scan Type: <select name="actions">
                  <option value="1">Detect OS and Services</option>
                  <option value="2">Standard service detection</option>
                  <option value="3">More aggressive Service Detection</option>
                  <option value="4">Lighter banner grabbing detection</option>
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
    $cmd = 'nmap -A '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//Detect OS and Services
    echo "<pre>$res</pre>";
}
else if ($command == 2) {
    $cmd = 'nmap -sV '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//Standard service detection
    echo "<pre>$res</pre>";
}
else if ($command == 3){
    $cmd = 'nmap -sV --version-intensity 5 '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//More aggressive Service Detection
    echo "<pre>$res</pre>";

}
else{
    $cmd = 'nmap -sV --version-intensity 0 '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//Lighter banner grabbing detection
    echo "<pre>$res</pre>";
}

}
?>