
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
            <div class="col m10 ">
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
                
                    
                    <!-- HEADER -->
                    <h2 class='pageheader'>Malahide Music Festival <br></h2>
                
                    
                    
                    <!-- TEXT -->
                        <h5 style="text-align:center"><br> Malahide Music Festival has sold out every year and continues to grow in popularity. In 2019 the festival upped the capacity and sold out in advance.</h5>
                        <h5 style="text-align:center"> Don’t miss out on our next year’s Super Early Bird Tickets. They’re out now! <a href="buytickets.php"><img src='img/shop.png' class="centerimg" style="width: 30px; height: 30px;" ></a></h5>
                        
                        
                
                            
                    
                    
                    
                    <!-- PARRALAX -->
                        <div class="bg-parallax" style="background-image: url('img/festival4.1.jpg'); ">
                            <div class="-front">
                                <h2 class="_alignCenter" style="padding: 50px; color: #FED648; font-weight: bold">DISCOVER EXCITING, NEW ARTISTS</h2>
                                
                            </div>
                        </div>
                            
                    
                    
                    
                    <!-- TEXT -->
                        <h5 style="text-align:center; padding-left: 15%; padding-right: 15%;"><br>The event runs for from the Friday through to the Sunday, with fantastic local acts guaranteed each evening.</h5>
                        <h5 style="text-align:center; padding-left: 15%; padding-right: 15%;"><br> The acts step on stage from 5 o'clock in the evening, however with plenty of food and drink being served, be sure to arrive early to get into the swing of things.</h5>
                        
                        <h4 style="text-align:center; color: #FED648"><br><br>Take a glance at last year's acts live...</h4>
                    
                    
                        
                    <!-- YOUTUBE -->
                        <center>
                        <div  class="iframe-container" style="width: 70%;">
                             <iframe  width="560" height="315" src="https://www.youtube.com/embed/sheLe6XHX60?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>    
                        </center>
                
                
                        
                    <!-- SLIDESHOW -->
                        <div class="slideshow-container" style="padding-left: 50px; padding-right: 50px;">
                            <div class="mySlides">
                                <q>"A one-of-a-kind experience!"</q>
                                <p class="author">- Irish Times</p>
                            </div>

                            <div class="mySlides">
                                <q>"Great atmosphere, great facilities, great weekend's craic!!"</q>
                                <p class="author">- Irish Star</p>
                            </div>

                            <div class="mySlides">
                                <q>"A well-deserved spotlight for young up and coming artists..."</q>
                                <p class="author">- Irish Independant</p>
                            </div>

                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>

                        </div>

                        <div class="dot-container">
                            <span class="dot" onclick="currentSlide(1)"></span> 
                            <span class="dot" onclick="currentSlide(2)"></span> 
                            <span class="dot" onclick="currentSlide(3)"></span> 
                        </div>

                        <script>
                        var slideIndex = 1;
                        showSlides(slideIndex);

                        function plusSlides(n) {
                          showSlides(slideIndex += n);
                        }

                        function currentSlide(n) {
                          showSlides(slideIndex = n);
                        }

                        function showSlides(n) {
                          var i;
                          var slides = document.getElementsByClassName("mySlides");
                          var dots = document.getElementsByClassName("dot");
                          if (n > slides.length) {slideIndex = 1}    
                          if (n < 1) {slideIndex = slides.length}
                          for (i = 0; i < slides.length; i++) {
                              slides[i].style.display = "none";  
                          }
                          for (i = 0; i < dots.length; i++) {
                              dots[i].className = dots[i].className.replace(" active", "");
                          }
                          slides[slideIndex-1].style.display = "block";  
                          dots[slideIndex-1].className += " active";
                        }
                        </script>
                
                </div>
                
                
                    <!-- BOTTOM -->
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