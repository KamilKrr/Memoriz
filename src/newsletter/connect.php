<?php
    $servername = "185.51.8.84";
    $username = "u174445db1";
    $password = ".h82v86ojhav";
    $dbName = "u174445db1";
        
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

?>