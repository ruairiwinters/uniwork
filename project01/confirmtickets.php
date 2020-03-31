<!DOCTYPE html>
<?php 
    include("showerrors.php");
//connect to DB
    include("connect.php");      
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
    $creditcard_no = $_POST['ccnumber'];
    $security_no = $_POST['security'];
    $expirymonth = $_POST['expirymonth'];
    $expiryyear = $_POST['expiryyear'];
    $title = $_POST['title'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $contact_no = $_POST['number'];
    $email = $_POST['email'];

    
    
    $total=$quantity*30;
    
    $updatequery = "INSERT INTO `malahide_tickets` (`ticket_id`, `ticket_date`, `ticket_no`, `title`, `forename`, `surname`, `address`, `postcode`, `contact_no`, `email`, `creditcard_no`, `security_no`, `expiry_date`, `expiry_year`) VALUES (NULL, '$date', '$quantity', '$title', '$fname', '$sname', '$address', '$postcode', '$contact_no', '$email', '$creditcard_no', '$security_no', '$expirymonth', '$expiryyear');";

$result = $conn->query($updatequery);

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <link rel="stylesheet" href="css/ui.css">
        <link rel="stylesheet" href="css/styles.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>
            jQuery(document).ready(function(){
                console.log("jquery engine loaded");
            });
        </script>
        
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
                
                <div class="_nightblue">
                    <img src="img/festival1.1.jpeg" style='width: 100%' >
                <!-- Content goes in here -->
                <h2 class='pageheader'>Thanks for your order</h2>
                <h3 style="text-align: center;">Looking forward to seeing you!</h3>
                
                <h4 style="padding-left: 30px;">Order Information</h4>
                <?php 
                
                
                        echo 
                        "<p style='padding-left: 30px'>Ticket Holder: $title $fname $sname<br>
                        You have purchased $quantity tickets for $date <br>
                        Total Sale: £$total<br>
                        A confirmation email has been sent to $email</p>";
                        
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
        </div>
            
        <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
    </body>
</html>