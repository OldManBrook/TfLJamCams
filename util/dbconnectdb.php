<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";
try {
     $dbo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();

}
?>
