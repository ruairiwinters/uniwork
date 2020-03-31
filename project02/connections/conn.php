<?php
include("showerrors.php");
include("password.php");
$user = "rwinters02";
$webserver = "rwinters02.web.eeecs.qub.ac.uk";
$db = "rwinters02";


$conn = new mysqli($webserver, $user, $password, $db);

if($conn->connect_errno){
    echo ("Connection failed: " . $conn->connect_error() );
}
