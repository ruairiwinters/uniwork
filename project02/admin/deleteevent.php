<?php
 session_start();
if (isset($_SESSION["userid_admin_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_admin_40206636'];
    
    
    
    
    include('../connections/conn.php');
    $id = $_GET['eventid'];
    
    $removedl = "DELETE FROM `project02_downloadable` WHERE eventid = $id";
    $deletedl = $conn->query($removedl);
    if (!$deletedl) {
            echo $conn->error;
        }else{
    $removemsg = "DELETE FROM `project02_messages` WHERE eventid = $id";
    $deletemsg = $conn->query($removemsg);
    if (!$deletemsg) {
            echo $conn->error;
        }else{
    $removeimg = "DELETE FROM `project02_eventimg` WHERE eventid = $id";
    $deleteimg = $conn->query($removeimg);
    if (!$deleteimg) {
            echo $conn->error;
        }else{
    $removetext = "DELETE FROM `project02_eventtext` WHERE eventid = $id";
    $deletetext = $conn->query($removetext);
    if (!$deletetext) {
            echo $conn->error;
        }else{
    $removereview = "DELETE FROM `project02_reviews` WHERE eventid = $id";
    $deletereview = $conn->query($removereview);
    if (!$deletereview) {
            echo $conn->error;
        }else{
    $removetickets = "DELETE FROM `project02_tickets` WHERE eventid = $id";
    $deletetickets = $conn->query($removetickets);
    if (!$deletetickets) {
            echo $conn->error;
        }else{
    $removelinks = "DELETE FROM `project02_actseventslink` WHERE `eventid` = $id";
    $remove = $conn->query($removelinks);
    if (!$remove) {
            echo $conn->error;
        }else{
            $deletevent = "DELETE FROM `project02_events` WHERE `id` = $id";
            $delete = $conn->query($deletevent);
    if (!$delete) {
            echo $conn->error;
        }else{
    header("Location: event.php");                        
    
    
        }}

}}}}}}}else {
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
        
        <?PHP
        $id = $_GET['eventid'];
        echo"<h1>$id</h1>"
        ?>
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
