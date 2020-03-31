<?php
 session_start();
if (isset($_SESSION["userid_admin_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_admin_40206636'];
    
    
    
    
    include('../connections/conn.php');
    $id = $_GET['actid'];
    
    $removeimglinks = "DELETE FROM `project02_actimg` WHERE `actid` = $id";
    $removeimg = $conn->query($removeimglinks);
    if (!$removeimg) {
            echo $conn->error;
        }else{
    $removelinks = "DELETE FROM `project02_actseventslink` WHERE `actid` = $id";
    $remove = $conn->query($removelinks);
    if (!$remove) {
            echo $conn->error;
        }else{
    $removequery = "DELETE FROM `project02_acts` WHERE `id` = $id";
    $deleteact = $conn->query($removequery);
    if (!$deleteact) {
            echo $conn->error;
        }else{
    
    header("Location: acts.php");                        
    
    
}}}}else {
    $userisset = 'not logged in';
    header("Location: ../login.php");
}
    include('../connections/conn.php');
    

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../ui/styles.css">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <title>Bel-Festival</title>
    </head>
    <body>
        <nav>
            <ul class="topnav " id="myTopnav2">
                <li><a href="index.php" class="brand">Administration Page</a></li>
                <li> <a href='../viewaccount.php'>View Account</a> </li>  
                <li class="-icon">
                   <a href="javascript:void(0);" onclick="topnav('myTopnav2')">Menu</a>
                </li>
            </ul>
             
        </nav>    
        
        <!---Header--->    
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
