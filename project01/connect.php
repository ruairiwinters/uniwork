<?php

//connect to DB
$user = "rwinters02";
include("password.php");
$webserver="rwinters02.web.eeecs.qub.ac.uk";

//database name for MySQL
$db="rwinters02";
        
$conn = new mysqli($webserver, $user, $password, $db);

//error check to make sure it works
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
}