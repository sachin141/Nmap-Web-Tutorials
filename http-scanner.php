<html>
<head></head>
<body>
    <form method="post" action="">
    Scan Type: <select name="actions">
                  <option value="1">page titles</option>
                  <option value="2">HTTP headers</option>
                  <option value="3">Find web apps</option>
                </select>
    IP Address/Host:<input type="text" name="ip_address">
    <input type="submit" name="submit" />
    </form>
</body>
</html>

<?php 

ini_set('zlib.output_compression', false);// Turn off PHP output compression
while (@ob_end_flush());//Flush the output buffer and turn off output buffering
ini_set('implicit_flush', true);// Implicitly flush the buffer
ob_implicit_flush(true);// Implicitly flush the buffer
set_time_limit(0);//Set this so PHP doesn't timeout during a long stream 

if(isset($_POST['submit'])){
$ip = $_POST['ip_address'];
$command = $_POST['actions'];


if ( $command == 1)
{
    $cmd = 'nmap --script=http-title '.$ip.'/24';
    echo $cmd;
    $res = shell_exec($cmd);//page titles
    echo "<pre>$res</pre>";
}
else if ($command == 2) {
    $cmd = 'nmap --script=http-headers '.$ip.'/24';
    echo $cmd;
    $res = shell_exec($cmd);//HTTP headers
    echo "<pre>$res</pre>";
}
else{
    $cmd = 'nmap --script=http-enum '.$ip.'/24';
    echo $cmd;
    $res = shell_exec($cmd);//Find web apps
    echo "<pre>$res</pre>";

}

}
?>