<meta http-equiv="refresh" content="30" >

<?php
$url='127.0.0.1:3306';
$username='iot';
$password='bKocGy';
$db='iot';
$connected=False;



try {
    $conn=mysqli_connect($url,$username,$password,$db);
    
    $connected = True;
}
catch (Exception $e ) {
    die("Error: " . $e->getMessage());
    
}



?>
