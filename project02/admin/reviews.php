<?php
 session_start();
if (isset($_SESSION["userid_admin_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_admin_40206636'];
} else {
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
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
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
        <div class='col m1'></div>
        <div class='col m10'>
        
        <h1 align="center">Reviews </h1>
        
        <?php
        $viewreviews = "SELECT * FROM `project02_reviews`";
        $readreviews = $conn->query($viewreviews);
        if (!$readreviews) {
        echo $conn->error;
    } 

        while ($rowread = $readreviews->fetch_assoc()) {

            $id = $rowread['id'];
            $eventid = $rowread['eventid'];
            $review = $rowread['review'];
            
            $getname="SELECT * FROM project02_events WHERE id = $eventid";
            $readname = $conn->query($getname);
            if (!$readname) {
                echo $conn->error;
            } 
            while ($rowread = $readname->fetch_assoc()) {
            $name = $rowread['eventname'];
            
            echo"<button class='accordion _box _shadow _dark'>$name
                <a href='deletereviews.php?reviewid=$id'>
                    <img src='../img/bin.png' style='width: 5%' align='right'>
                </a>
                </button>
                
                    <div class='-panel'>
                        <p>Review: $review</p>    
        </div>";}}?>
            
             <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
