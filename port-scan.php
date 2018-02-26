
<html>
<head></head>
<body>
    <form method="post" action="">
    Scan Type: <select name="actions">
                  <option value="1">TCP connect</option>
                  <option value="2">TCP SYN scan default</option>
                  <option value="3">UDP port</option>
                  <option value="4">selected ports</option>
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
    $cmd = 'nmap -sT '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//TCP connect
    echo "<pre>$res</pre>";
}
else if ($command == 2) {
    $cmd = 'nmap -sS '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//TCP SYN scan default
    echo "<pre>$res</pre>";
}
else if ($command == 3){
    $cmd = 'nmap -sU -p 123,161,162 '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//UDP port
    echo "<pre>$res</pre>";

}
else{
    $cmd = 'nmap -Pn -F '.$ip.'';
    echo $cmd;
    $res = shell_exec($cmd);//selected ports
    echo "<pre>$res</pre>";
}

}
?>