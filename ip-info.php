<html>
<head></head>
<body>
    <form method="post" action="">
    IP Address /Host:<input type="text" name="ip_address">
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


    $cmd = 'nmap --script=asn-query,whois,ip-geolocation-maxmind '.$ip.'/24';
    echo $cmd;
    $res = shell_exec($cmd);//IP Info
    echo "<pre>$res</pre>";


}
?>
