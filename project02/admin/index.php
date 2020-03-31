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
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <title>Bel-Festival</title>
    </head>
    <body>
        <nav>
            <ul class="topnav " id="myTopnav2">
                <li><a href="index.php" class="brand">Administration Page</a></li>
                <li><a href="../index.php" >Home</a></li>
                <li> <a href='../viewaccount.php'>View Account</a> </li>  
                
                <li class="-icon">
                   <a href="javascript:void(0);" onclick="topnav('myTopnav2')">Menu</a>
                </li>
            </ul>
             
        </nav>    
        
        <!---Header--->    
        <div class='col m2'><?php echo"<a href='../viewaccount.php'><img src='../img/back.png' width=40%></a>";?></div>
        <div class='col m8'>
        <div class='container'> 	
            <div id="content">
                <br>
                <div class="jumbo _dark">
                    <a href='event.php'><button class="_xlarge _white">Events</button></a>
                    <h5> Delete or Edit Events </h5>
                </div>
                <br>
                <div class="jumbo _dark">
                    <a href='users.php'><button class="_xlarge _white">Users</button></a>
                    <h5> Promote, Demote or Delete Users </h5>
                </div>
                <br>
                <div class="jumbo _dark">
                    <a href='acts.php'><button class="_xlarge _white">View All Acts</button></a>
                    <h5> Delete, Edit or Add Acts </h5>
                </div>
                <br>
                <div class="jumbo _dark">
                    <a href='passwordreset.php'><button class="_xlarge _white">Password Resets</button></a>
                    <h5> View users looking to reset passwords </h5>
                </div>
                <br>
                <div class="jumbo _dark">
                    <a href='homepage.php'><button class="_xlarge _white">Edit Home Page</button></a>
                    <h5> Add or delete text from home page </h5>
                </div>
                <br>
                <div class='jumbo _dark'>
                    <a href='reviews.php'><button class='_xlarge _white'>Reviews</button></a>
                    <h5> View and Delete Reviews of Events </h5>
                </div>
                <br>
                <div class='jumbo _dark'>
                    <a href='type.php'><button class='_xlarge _white'>Type</button></a>
                    <h5> View, Edit and Delete Event Types </h5>
                </div>
                <br>
            </div>
        </div>
        
        
        </div><div class='col m2'></div>
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
