<?php
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "cellphoneshopv0";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->connect_error ? die("Connection failed: ".$conn->connect_error) : '';
?>