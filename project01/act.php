<?php
include("showerrors.php");
//connect to DB
include("connect.php");

$lineupid = $_GET['actid'];

$readquery = "SELECT * FROM malahide_lineup WHERE id = '$lineupid'";

$result = $conn->query($readquery);

if (!$result) {
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
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/ui.css">
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
                <div class="_nightblue">
                    
                    <?php 
                            
                            while($rowread = $result ->fetch_assoc()){
                          
                                $lineupname = $rowread['name'];
               			$lineupdesc = $rowread["description"];  
                                $lineupid = $rowread["id"];
                                $lineupgenre = $rowread["genre"];
                                $lineupsong = $rowread["song"];
                                $lineupdate = $rowread["date"];
                                $imagedata1 = $rowread["image1"];
                                $imagedata2 = $rowread["image2"];
                                $imagedata3 = $rowread["image3"];
                                $lineupnospace =str_replace(' ', '+', $lineupname);
                            
                            echo 
                                "<br>
                                    
                                <h2 class='pageheader' >$lineupname </h2>
                                    <div class='section' >
                                    <div class='imagedisplay'>
                                    <div class='actslideshow-container'>

                                        <div class='mySlides actfade'>
                                            <div class='actnumbertext'>1 / 3</div>
                                            <img src='uploaded/$imagedata1' style='width:450px;height:250px;' />
                                        </div>
                                        <div class='mySlides actfade'>
                                            <div class='actnumbertext'>2 / 3</div>
                                            <img src='uploaded/$imagedata2' style='width:450px;height:250px;' />
                                        </div>
                                        <div class='mySlides actfade'>
                                            <div class='actnumbertext'>3 / 3</div>
                                            <img src='uploaded/$imagedata3' style='width:450px;height:250px;' />
                                        </div>
                                        
                                    </div>
                                    <br>

                                    <div style='text-align:center'>
                                        <span class='actdot'></span> 
                                        <span class='actdot'></span> 
                                        <span class='actdot'></span> 
                                    </div>

                                    <script>
                                        var slideIndex = 0;
                                        showSlides();

                                        function showSlides() {
                                          var i;
                                          var slides = document.getElementsByClassName('mySlides');
                                          var dots = document.getElementsByClassName('actdot');
                                          for (i = 0; i < slides.length; i++) {
                                            slides[i].style.display = 'none';  
                                          }
                                          slideIndex++;
                                          if (slideIndex > slides.length) {slideIndex = 1}    
                                          for (i = 0; i < dots.length; i++) {
                                            dots[i].className = dots[i].className.replace(' active', '');
                                          }
                                          slides[slideIndex-1].style.display = 'block';  
                                          dots[slideIndex-1].className += ' active';
                                          setTimeout(showSlides, 3500); // Change image every 3.5 seconds
                                        }
                                    </script>
                                    
                                
                                <h3 class='actheader'>Description:</h3>
                                <p>$lineupdesc</p>
                                    <p></p>
                                <h3 class='actheader'>Genre:</h3>
                                <p> $lineupgenre</p>
                                    <p></p>
                                    <h3 class='actheader'>Most Famous For:</h3>
                                <p> $lineupsong</p>
                                    <p></p>
                                    <h3 class='actheader'>Date Performing:</h3>
                                <p> $lineupdate</p>
                                    <p></p>
                                
                                <h3 style='text-align:center'><a href='http://www.youtube.com/results?search_query=$lineupnospace+$lineupsong'>
                                    <img src='img/youtube.png' style='width:150px; height=150px;'>
                                </a></h3>
                                
                                

                            </div>";
                            }
                            
                            ?>
                            
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
                </div>    
            <div class="col m1"></div>
        
        <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
    </body>
</html>