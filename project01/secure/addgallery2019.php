<?php
//code to stop access to secure via URL
    session_start();
    if(!isset($_SESSION["admin_40206636"]))
    {
        header("Location: login.php");
    }
?>

<?php
include("../showerrors.php");
//connect to DB
include("../connect.php");
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
                            <h2>Upload Image<h2>


                                    <form enctype='multipart/form-data' action='confirmaddgallery2019.php' method='POST'>



    <h5>Upload the  image: <input name='image' type='file' > </h5>";
    <h5>Caption: <input type='text' name='captiondata' > </h5>
    
    
                                        <input type='submit' value='Add!'>
                                    </form>

                                    </div>
                        <a href="index.php"><h6 style="color: #ffffff">Return to Administration Page</h6></a>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col m1"></div>
                                    </body>

                                    </html>