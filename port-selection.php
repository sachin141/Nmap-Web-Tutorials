
<html>
<head></head>
<body>
    <form method="post" action="">
    Scan Type: <select name="actions">
                  <option value="1">Scan Single Port</option>
                  <option value="2">Scan Range of ports</option>
                  <option value="3">Scan 100 commen ports</option>
                  <option value="4">Scan all 65535 ports</option>
                </select>
    IP Address/Host:<input type="text" name="ip_address">
    Port no:<input type="text" name="port">
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
$port = $_POST['port'];


if ( $command == 1)
{
    $cmd = 'nmap -p '.$port.' '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//Scan Single Port
    echo "<pre>$res</pre>";
}
else if ($command == 2) {
    $cmd = 'nmap -p '.$port.' '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//Scan Range of ports
    echo "<pre>$res</pre>";
}
else if ($command == 3){
    $cmd = 'nmap -F '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//Scan 100 commen ports
    echo "<pre>$res</pre>";

}
else{
    $cmd = 'nmap -p- '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//Scan all 65535 ports
    echo "<pre>$res</pre>";
}

}
?>