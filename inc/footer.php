<?php
$url='127.0.0.1:3306';
$username='test';
$password='test';
$db='office';
$connected=False;
try {
    $conn=mysqli_connect($url,$username,$password,$db);
    echo "Connection to the database established";
    $connected = True;
}
catch (Exception $e ) {
    echo "Error: " . $e->getMessage();
    
}

?>