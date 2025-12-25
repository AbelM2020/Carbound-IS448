<?php
$host = 'studentdb-maria.gl.umbc.edu';
$user = 'abelm1';      
$pass = 'NewPasswordHere';   
$dbname = 'abelm1';    

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
