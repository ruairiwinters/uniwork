<?php
session_start(); 
session_destroy();
?>

<!DOCTYPE html> 
<html> 
    <head> 
        <title>Administration Login</title> 
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

                            <h1>Administration Login</h1>

                            <div class="row">
                                <div>
                                    <h5>Please login to enter the administration site</h5>
                                </div>
                                
                                
                            </div>
                            <form action="sign.php" method="post">
                                    <h6>
                                        <label>Username:</label>
                                        <input name="userfield" type="text" required="required" value="" placeholder="Username"><span id="help"> Provide a valid username.</span><br/>
                                    </h6>
                                    <h6>
                                        <label>Password:</label>
                                        <input name="passfield" type="password" required="required" value=""><span id="help"> Provide a valid password</span><br/>
                                    </h6>
                                    
                                    <input id="but" class="button-primary mysubmit" type="submit" value="Login" style="background-color: #FBC73D"/>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m1"></div>
    </body>

</html>