<?php
//code to stop access to secure via URL
    session_start();
    if(!isset($_SESSION["admin_40206636"]))
    {
        header("Location: login.php");
    }
?>
<?php 
session_start();
include("../showerrors.php");
//connect to DB
include("../connect.php");

$uname=$_POST["userfield"];
$password=$_POST["passfield"];
$checkuser = " SELECT * FROM malahide_users WHERE user='$uname' AND password='$password'";
$userresult  = $conn->query($checkuser);

if(!$userresult){
    echo $conn->error;
}
$returnedrows=$userresult->num_rows;

if($returnedrows >0){
    $_SESSION['admin_40206636']= $uname;
    header("Location: index.php");
}else{
    header("Location: login.php");
}

?>
