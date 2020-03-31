<?php
include("showerrors.php");
//connect to DB
include("connect.php");

$readquery1 = "SELECT * FROM malahide_lineup WHERE date = '2020-06-26'";
$readquery2 = "SELECT * FROM malahide_lineup WHERE date = '2020-06-27'";
$readquery3 = "SELECT * FROM malahide_lineup WHERE date = '2020-06-28'";
 
$result1 = $conn -> query($readquery1);
$result2 = $conn -> query($readquery2);
$result3 = $conn -> query($readquery3);

if (!$result1 || !$result2 || !$result3) {
    // the query failed show error to web user
    echo $conn->error;
}


?>

<html>
    <head>
        <title>Malahide Music Festival</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <!-- Links to load UI Framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css"/>
        <link rel="stylesheet" href="css/ui.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="row">
            <div class="col m1"></div>
            <div class="col m10">
                <ul class="topnav _f-yellow _nightblue" id="myTopnav2">
                    <li><a href="home.php" class="brand _f-yellow">Home</a></li>
                        <li><a href="lineup.php" class="active">Lineup</a></li>
                        <li><a href="venue.php" class="active">Venue</a></li>
                        <li><a href="buytickets.php" class="active">Tickets</a></li>
                        <li class="dropdown"><a href="#" class ="active">Gallery</a><div class="dropdown-content">
                            <a href="gallery2018.php" class ="active">2018 Photos</a>
                            <a href="gallery2019.php" class ="active">2019 Photos</a></div></li>
                        <li><a href="secure/login.php" class ="active">Login</a></li>    
                        <li class="-icon">
                   <a href="javascript:void(0);" onclick="topnav('myTopnav2')">Menu</a>
                </li>

            </ul>
                <img src="img/festival1.1.jpeg" style='width: 100%' >
                
                
                <!-- Content-->
                <div class="row _nightblue">
                   <h1 class='pageheader'>Lineup </h1>
                   <h5 style="text-align:center; padding-left: 15%; padding-right: 15%;">Just a few of the acts confirmed so far, more to be announced soon...</h5>
                
                <div class="col m12"></div>
                <div><p></p></div>
                <h3 class='lineupheader'>Friday 26th June</h3>
                <?php 
                            
                            while($rowread = $result1 ->fetch_assoc()){
                          
                                $lineupname = $rowread['name'];
               			$lineupdesc = $rowread["description"];  
                                $lineupid = $rowread["id"];
                                $lineupgenre = $rowread["genre"];
                                $lineupsong = $rowread["song"];
                                $lineupdate = $rowread["date"];
                                $imagedata1 = $rowread["image1"];
                            
                                
                                echo 
                                    "
                                <div class='section'><a href='act.php?actid=$lineupid'>
                                
                                <div class='lineupcontainer' >
                                <img src='uploaded/$imagedata1' style='width:500px' class='modalimg lineupimg'>
                                <div class='lineupcontent'>
                                <h5 style='font-weight: bold'>$lineupname</h5>
                                    </div>
                                    </div>
                            </a></div>"
                            ;}
                            ?>
                
                <div><p></p></div>
                
                <div class="col m12"></div>
                <h3 class='lineupheader'>Saturday 27th June</h3>
                <?php 
                            
                            while($rowread = $result2 ->fetch_assoc()){
                          
                                $lineupname = $rowread['name'];
               			$lineupdesc = $rowread["description"];  
                                $lineupid = $rowread["id"];
                                $lineupgenre = $rowread["genre"];
                                $lineupsong = $rowread["song"];
                                $lineupdate = $rowread["date"];
                                $imagedata2 = $rowread["image2"];
                                
                            
                            echo 
                                    "
                                <div class='section'><a href='act.php?actid=$lineupid'>
                                
                                <div class='lineupcontainer' >
                                <img src='uploaded/$imagedata2' style='width:500px' class='modalimg lineupimg'>
                                <div class='lineupcontent'>
                                <h5>$lineupname</h5>
                                    </div>
                                    </div>
                            </a></div>"
                            ;}
                            ?>
                
                <div><p></p></div>
                
                <div class="col m12"></div>
                <h3 class='lineupheader'>Sunday 28th June</h3>
                <?php 
                            
                            while($rowread = $result3 ->fetch_assoc()){
                          
                                $lineupname = $rowread['name'];
               			$lineupdesc = $rowread["description"];  
                                $lineupid = $rowread["id"];
                                $lineupgenre = $rowread["genre"];
                                $lineupsong = $rowread["song"];
                                $lineupdate = $rowread["date"];
                                $imagedata3 = $rowread["image3"];
                                
                            
                            echo 
                                "
                                <div class='section'><a href='act.php?actid=$lineupid'>
                                
                                <div class='lineupcontainer' >
                                <img src='uploaded/$imagedata3' style='width:500px' class='modalimg lineupimg'>
                                <div class='lineupcontent'>
                                <h5>$lineupname</h5>
                                    </div>
                                    </div>
                            </a></div>"
                            ;}
                            ?>
 
                </div>
                
                <div class="row" style="background: linear-gradient(to bottom, #2d3e50 0%, #808080 100%);">
                    <br>
                </div>
                <div class="row" style="background-color: gray">
                    <p align="right" style="padding-right: 20px; padding-top: 15px; padding-bottom: 0px; color: white;"> (028) 8363-4324 <br>
                        2, The Green, Strand St, Malahide, 
                        <br>Co. Dublin, Ireland
                    <div style="padding-right: 15px;">
                    <a href="https://www.twitter.com"><img src="img/twitter.png" align="right" style="height: 40px; width: 40px;"> </a>
                    <a href="https://www.facebook.com"><img src="img/facebook.png" align="right" style="height: 40px; width: 40px;"> </a>
                    <a href="https://www.instagram.com"><img src="img/insta.png" align="right" style="height: 40px; width: 40px;"> </a>
                    </div>
                    </p>
                    
                    
                </div>
            
            
                </div>
            <div class="col m1"></div>
        </div>
        <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
        
    </body>
</html>