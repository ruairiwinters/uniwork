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


                <div class="container _nightblue">

                    <div class="col-sm-12 col-md-12  col-lg-12 ">


                        <div class="section">

                            <h1>Lineup Details</h1>

                            <div class="row">

                                <div class='card large'>
                                    <a href="add.php">
                                        <div class='section'>
                                            <h3>Add an act </h3>
                                            <h6>Add a new act to the festival.</h6>
                                        </div>
                                    </a>
                                </div>
                                <div class='card large'>
                                    <a href="editlineupdetails.php">
                                        <div class='section'>
                                            <h3>Edit an Act</h3>
                                            <h6>Edit an existing act of the website</h6>
                                        </div>
                                    </a>
                                </div>

                                <div class='card large'>
                                    <a href="removelineupdetails.php">
                                        <div class='section'>
                                            <h3>Remove an act </h3>
                                            <h6>Remove an act from the festival</h6>
                                        </div>
                                    </a>
                                </div>


                            </div>
                        </div>
                        <a href="index.php"><h6 style="color: #ffffff">Return to Administration Page</h6></a>
                    </div>
                </div>
            </div>
            <div class="col m1"></div>
    </body>

</html>