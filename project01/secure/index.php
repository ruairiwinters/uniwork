<?php
//code to stop access to secure via URL
    session_start();
    if(!isset($_SESSION["admin_40206636"]))
    {
        header("Location: login.php");
    }
?>


<!DOCTYPE html> 
<html> 
    <head> 
        <title>Administration</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css">
        <link rel="stylesheet" href="../styles/ui.css">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css"/>
    </head>

    <body>	
        <div class="row">
            <div class="col m1"></div>
            <div class="col m10 _nightblue">
                <ul class="topnav _f-yellow _nightblue" id="myTopnav2">
                    <li style="float:right;"><a href="..//home.php" >Home Page</a></li>
                </ul>

                <div class="container _nightblue">

                    <div class="col-sm-12 col-md-12  col-lg-12 ">


                        <div class="section">

                            <h1>Admin Menu</h1>
                            <?php 
                                $name=$_SESSION["admin_40206636"];
                                echo "<h6> Logged in as: $name </h6>";
                            ?>

                            <div class="row">

                                <div class='card large'>
                                    <a href="editlineup.php">
                                        <div class='section'>
                                            <h3>Edit the Lineup </h3>
                                            <h6>Add, change or remove an act from the lineup.</h6>
                                        </div>
                                    </a>
                                </div>
                                <div class='card large'>
                                    <a href="viewtickets.php">       
                                    <div class='section'>
                                        <h3>View Ticket Info</h3>
                                        <h6>View details of tickets bought.</h6>
                                    </div>
                                    </a>
                                </div>
                                <div class='card large'>
                                    <a href="editgallery.php">       
                                    <div class='section'>
                                        <h3>Edit the Gallery</h3>
                                        <h6>Add or remove images from the galleries</h6>
                                    </div>
                                    </a>
                                </div>

                                

                            </div>
                                <a href="login.php">
                                    <input id="but" class="button-primary mysubmit" type="submit" value="Log Out" style="background-color: #b2b2b2"/>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m1"></div>
    </body>

</html>