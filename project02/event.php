<?php
 session_start();
if (isset($_SESSION["userid_40206636"])) {
    $userisset = 'logged in';
    $userid = $_SESSION['userid_40206636'];
    
} else {
    $userisset = 'not logged in';
    $userid = '0';
}
    include('connections/conn.php');
    
    $eventname = $conn -> real_escape_string($_GET['name']);
    
    $nav_read = "SELECT * FROM project02_type";
    $gettype = $conn->query($nav_read);
    if(!$gettype){	
	echo $conn -> error;
    }
    
    
    
    $event_read = "SELECT * FROM project02_events WHERE id='$eventname' ";
    $getevent = $conn->query($event_read);
    if(!$getevent){	
	echo $conn -> error;	
    } while ($rowread = $getevent->fetch_assoc()) {
                            
            $eventid = $rowread['id'];
            $name = $rowread['eventname'];
            $venue = $rowread['venue'];
            $startdate = $rowread['startdate'];
            $enddate = $rowread['enddate'];
    $type = $rowread['typeid'];}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="ui/styles.css">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <title>Bel-Festival</title>
    </head>
    <body>
        <nav>
            <ul class="topnav " id="myTopnav2">
                <li><a href="index.php" class="brand">Home</a></li>
                <li class='dropdown'><a href='#'>Events</a>
                    <div class='dropdown-content'>
                    <?php
                        while($row1 = $gettype->fetch_assoc()){
                            $typename = $row1['type'];
                            $typeid = $row1['id'];
                            echo "<a href='type.php?type=$typeid'>$typename</a> ";			
                            }    
                    ?>
                    </div>
                </li>
                <li class="-icon">
                   <a href="javascript:void(0);" onclick="topnav('myTopnav2')">Menu</a>
                </li>
            </ul>
             <div class='container'> 
                <ul id='mynav'>
                    <?php
                    while($row1 = $gettype->fetch_assoc()){
                            $typename = $row1['type'];
                            $typeid = $row1['id'];
                            echo "<a href='type.php?type=$typeid'>$typename</a> ";			
                            }
                        if($userisset == 'not logged in'){
                            echo "<li><a class='fsSubmitButton' <a href='login.php'>Sign In</a></li>";
                        } else {
                           echo "<li><a class='fsSubmitButton' <a href='viewaccount.php?userid=$userid'>View Account</a></li>";
                           
                        }
                    ?>
                    
                </ul>
            </div>
        </nav>    
        <div class='col m2'></div>
        <div class='col m8'>
            
            
            
            
        
        
        
        
        
        
        
        
        <!---Header--->    
        <?php
            echo"<br><h1 align='center'>$name</h1><br>"
        ?>
        
        <?php
        $checkurgent = "SELECT * FROM `project02_eventtext` WHERE `position` = 'Urgent' && `eventid` = '$eventid'";
        $geturgent = $conn->query($checkurgent);
        if(!$geturgent){	
            echo $conn -> error;	
        }
        
        while ($row = $geturgent->fetch_assoc()) {
            echo"<h4 align='center' style='color:red; font-weight:bold'>URGENT NEWS</h4>";
                    $text = $row["text"];
                    echo "<div class='box5'>
                            <h5 align='center' align='middle'>$text</h4>
                        </div><br>"          ;}
        ?>
        
            
            
            
            
        <?php
        $getdays = "SELECT DATEDIFF('$enddate', '$startdate') AS DateDiff";
        $readday = $conn->query($getdays);
    if(!$readday){	
	echo $conn -> error;	
    } while ($rowread = $readday->fetch_assoc()) {
        $day = $rowread['DateDiff'];
        $correctday = $day +1;
    }
        
        
            echo"   <div class='box4'>
                        <h5 align='center' align='middle'>Venue: $venue</h5>";
                            if($correctday==1){
                                echo"<h5 align='center' align='middle'>Date: $startdate</h5>
                                    <h5 align='center' align='middle'>This is a single day event.</h5>
                    </div> ";
                            } else {
                                echo"<h5 align='center' align='middle'>Dates: $startdate - $enddate</h5>
                                <h5 align='center' align='middle'>This event lasts $correctday days long.</h5>
                            </div> ";}
        
        
        
        ?>
        
        
        <?php
        $checktop = "SELECT * FROM `project02_eventtext` WHERE `position` = 'Top' && `eventid` = '$eventid'";
        $gettop = $conn->query($checktop);
        if(!$gettop){	
            echo $conn -> error;	
        }
        while ($row = $gettop->fetch_assoc()) {
                    $text = $row["text"];
                    echo "<br><div class='box4'>
                            <h5 align='center' align='middle'>$text</h4>
                        </div><br>"          ;}
        ?>
        
            
        <?php
        $checktopimg = "SELECT * FROM `project02_eventimg` WHERE `position` = 'Top' && `eventid` = '$eventid'";
        $gettopimg = $conn->query($checktopimg);
        if(!$gettopimg){	
            echo $conn -> error;	
        }
        while ($row = $gettopimg->fetch_assoc()) {
                    $filepath = $row["filepath"];
                    echo "<img class=\"marginauto\" src='eventimg/$filepath' width=\"60%\">";}
        ?>
        
        
             
        <?php
        $act_read = "SELECT project02_acts.id, project02_acts.name FROM project02_acts INNER JOIN project02_actseventslink ON project02_acts.id = project02_actseventslink.actid WHERE project02_actseventslink.eventid ='$eventname' ";
    $getact = $conn->query($act_read);
    if(!$getact){	
	echo $conn -> error;	
    }
    $num = $getact->num_rows;
                            if ($num >0){
        echo"<div class='container'><div class='box4'>
            <h3 align='center' align='middle'>Acts attending so far...</h3>
        </div>";        
                //---Show Acts--->
        while($row = $getact->fetch_assoc()){
			$acttitle = $row["name"];
                        $actid = $row["id"];
                        
                $getimage= "SELECT * FROM project02_actimg WHERE `actid` = $actid GROUP BY `actid`";
                $readimg = $conn->query($getimage);
                    if(!$readimg){	
                        echo $conn -> error;
                    }
                        $numimg = $readimg->num_rows;
                            if ($numimg >0){
                     while ($rowread = $readimg->fetch_assoc()) {
                        $file = $rowread['filename'];
                        
                        
                    echo    "<a href='act.php?actid=$actid&&eventid=$eventname'><div class='box6'>
                                        <img src='actimg/$file'>
                                </div></a> ";
                            }} else  {
                            echo"<a href='act.php?actid=$actid&&eventid=$eventname'><div class='box6'>
                                    <h4 align='center' align='middle'>$acttitle</h4>
                                </div></a> ";
                                
        }} echo"</div>";
                            } 
                    
                    
                    
                    
                    else{
                               echo"<div class='box4'>
            <h3 align='center' align='middle'>No Acts Confirmed Yet</h3>
        </div>"; 
                            }
                    ?>
        
        
        
        <?php
        $checkmiddle = "SELECT * FROM `project02_eventtext` WHERE `position` = 'Middle' && `eventid` = '$eventid'";
        $getmiddle = $conn->query($checkmiddle);
        if(!$getmiddle){	
            echo $conn -> error;	
        }
        while ($row = $getmiddle->fetch_assoc()) {
                    $text = $row["text"];
                    echo "<br><div class='box4'>
                            <h5 align='center' align='middle'>$text</h4>
                        </div><br>"          ;}
        ?>
        <?php
        $checkmiddleimg = "SELECT * FROM `project02_eventimg` WHERE `position` = 'Middle' && `eventid` = '$eventid'";
        $getmiddleimg = $conn->query($checkmiddleimg);
        if(!$getmiddleimg){	
            echo $conn -> error;	
        }
        while ($row = $getmiddleimg->fetch_assoc()) {
                    $filepath = $row["filepath"];
                    echo "<img class=\"marginauto\" src='eventimg/$filepath' width=\"60%\">";}
        ?>
        
        
        
        <!---Reviews--->
        <?PHP
        $checkreviews = "SELECT * FROM project02_reviews WHERE eventid = $eventname";
        $readreview = $conn->query($checkreviews);
                    if(!$readreview){	
                        echo $conn -> error;
                    }
                        $numreview = $readreview->num_rows;
                            if ($numreview >0){
                                echo"<br><br>
        <div class=\"slideshow-container\" style=\"padding-left: 50px; padding-right: 50px;\">";
        
                                
                                while ($rowread = $readreview->fetch_assoc()) {
                        $review = $rowread['review'];
                        $userid1 = $rowread['userid'];
                        
                        $getusername = "SELECT * FROM project02_publicusers WHERE id = $userid1";
                        $readname = $conn->query($getusername);
                    if(!$readname){	
                        echo $conn -> error;
                    } while ($rowread = $readname->fetch_assoc()) {
                        $username = $rowread['username'];
                        
                        
                        
                                echo"
                            <div class=\"mySlides\">
                                <q>\"$review\"</q>
                                <p class=\"author\">- $username</p>
                            </div>";}} echo"

                            <a class=\"prev\" onclick=\"plusSlides(-1)\">❮</a>
                            <a class=\"next\" onclick=\"plusSlides(1)\">❯</a>

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
                          var slides = document.getElementsByClassName(\"mySlides\");
                          var dots = document.getElementsByClassName(\"dot\");
                          if (n > slides.length) {slideIndex = 1}    
                          if (n < 1) {slideIndex = slides.length}
                          for (i = 0; i < slides.length; i++) {
                              slides[i].style.display = \"none\";  
                          }
                          for (i = 0; i < dots.length; i++) {
                              dots[i].className = dots[i].className.replace(\" active\", \"\");
                          }
                          slides[slideIndex-1].style.display = \"block\";  
                          dots[slideIndex-1].className += \" active\";
                        }
                                </script>";}?>
        
        
        <?php
        $checkbottom = "SELECT * FROM `project02_eventtext` WHERE `position` = 'Bottom' && `eventid` = '$eventid'";
        $getbottom = $conn->query($checkbottom);
        if(!$getbottom){	
            echo $conn -> error;	
        }
        while ($row = $getbottom->fetch_assoc()) {
                    $text = $row["text"];
                    echo "<br><div class='box4'>
                            <h5 align='center' align='middle'>$text</h4>
                        </div><br>"          ;}
        ?>
        <?php
        $checkbottomimg = "SELECT * FROM `project02_eventimg` WHERE `position` = 'Bottom' && `eventid` = '$eventid'";
        $getbottomimg = $conn->query($checkbottomimg);
        if(!$getbottomimg){	
            echo $conn -> error;	
        }
        while ($row = $getbottomimg->fetch_assoc()) {
                    $filepath = $row["filepath"];
                    echo "<img class=\"marginauto\" src='eventimg/$filepath' width=\"60%\">";}
        ?>
        
        
        <?php
        $checkdownload = "SELECT * FROM `project02_downloadable` WHERE `access` = 'Everyone' && `eventid` = '$eventid'";
        $getdownload = $conn->query($checkdownload);
        if(!$getdownload){	
            echo $conn -> error;	
        }
        while ($row = $getdownload->fetch_assoc()) {
                    $filename = $row["name"];
                    $downloadpath = $row["filepath"];
                    echo "<br><div class='box4'>
                            <a href=\"downloadable/$downloadpath\" download><h6 align='center' align='middle'>Click here to download: $filename</h6></a>
                        </div>"          ;}
        ?>
        
        <br><br>
        <!---Buy Tickets--->
        <?php
            $checkusertype = "SELECT * FROM `project02_publicusers` WHERE id = '$userid' AND usertype = '1'";
            $checktype = $conn->query($checkusertype);
                                        if (mysqli_num_rows($checktype) > 0) {
                                           
                                            
            
            
                                            
            //<---Tickets Already Bought--->                                
            $checktickets = "SELECT * FROM `project02_tickets` WHERE eventid = $eventid && userid = $userid";
            $checkbought = $conn->query($checktickets);
            $rowread = $checkbought->fetch_assoc();
                            
            $quantity = $rowread['quantity'];
            $addid = $rowread['id'];
                                        if (mysqli_num_rows($checkbought) > 0) {
                                            
        //<---Show Ticket Reserver Files--->    
        $checkdownload1 = "SELECT * FROM `project02_downloadable` WHERE `access` = 'reservers' && `eventid` = '$eventid'";
        $getdownload1 = $conn->query($checkdownload1);
        if(!$getdownload1){	
            echo $conn -> error;	
        }
        while ($row = $getdownload1->fetch_assoc()) {
                    $filename1 = $row["name"];
                    $downloadpath1 = $row["filepath"];
                    echo "<div class='box4'>
                            <a href=\"downloadable/$downloadpath1\" download><h6 align='center' align='middle'>Click here to download: $filename1</h6></a>
                        </div>"          ;}
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            if($quantity==1){
                                            echo "You Already Have 1 Ticket Reserved";
                                            echo "<div class='col m2'></div><div class='col m8'>
                <form enctype='multipart/form-data' action='' method='POST'>
                    <p>How many more tickets would you like to reserve? 
                        <select id='ticket' name='ticket'><>
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            
                        </select>
                        <p>
                            <input name='add' type='submit' value='Reserve'/>
                        
                </form>
                </div><div class='col m2'></div>
                ";
                                            
                                            
                                            
                                            if ( isset($_POST['add'])) {
                    
                    $ticket = $_POST['ticket'];
                    $newquantity= $ticket + $quantity;
                    
                    $addtickets = ("UPDATE `project02_tickets` SET `quantity`= $newquantity WHERE id=$addid");
                    $result = $conn->query($addtickets);
                    if (!$result) {
                    echo $conn->error;
                }}
                                            
                                            
                                            
                                            
                                            
                                            
                                            
            } else if($quantity>1){
             echo "You Already Have $quantity Tickets Reserved";
             echo "<div class='col m2'></div><div class='col m8'>
                <form enctype='multipart/form-data' action='' method='POST'>
                    <p>How many more tickets would you like to reserve? 
                        <select id='ticket' name='ticket'><>
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            
                        </select>
                        <p>
                            <input name='add' type='submit' value='Reserve'/>
                        
                </form>
                </div><div class='col m2'></div>
                ";
                                            
                                            
                                            
                                            if ( isset($_POST['add'])) { 
                    
                    $ticket = $_POST['ticket'];
                    $newquantity= $ticket + $quantity;
                    
                    $addtickets = ("UPDATE `project02_tickets` SET `quantity`= $newquantity WHERE id=$addid");
                    $result = $conn->query($addtickets);
                    if (!$result) {
                    echo $conn->error;
                }}
                
            }   
                                        } else {
            
                                            
                                            
                                            
                                            
            
            
            
            //<---No Tickets Already Bought--->
            echo "<div class='col m2'></div><div class='col m8'>
                <form enctype='multipart/form-data' action='' method='POST'>
                    <p>How many tickets would you like to reserve? 
                        <select id='ticket' name='ticket'><>
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            
                        </select>
                        <p>
                            <input name='submit' type='submit' value='Reserve'/>
                        
                </form>
                </div><div class='col m2'></div>
                ";
      
        }
        //<---Leave a Review---> 
        echo"<div class='box4'>
            <br><h3 align='center' align='middle'>Leave A Review</h3>
        </div>
        <form enctype='multipart/form-data' action='' method='POST'>

       
       <textarea name=\"text\" cols=\"75\" rows=\"10\" margin-left: auto;
    margin-right: auto;></textarea>
       
       <div id='sub'>
            <input name='submitreview' type='submit' value='Submit Review'/>
        </div>
        </form>";
        
        
                if ( isset($_POST['submitreview'])) {
                    if(empty($text = $_POST['text'])){
                        echo"Please type in text<br>";
                    } else {
                    
                    $text = $_POST['text'];
                    
                    $addquery = ("INSERT INTO `project02_reviews` (`id`, `review`, `eventid`, `userid`) VALUES (NULL, '$text', '$eventname', '$userid');");
                    $result = $conn->query($addquery);
                    if (!$result) {
                    echo $conn->error;
                } 
//                header("Refresh:0");
                                        }}
            
                                            
                                            
            
            
                                            
            //<---Not Appropriate User--->    
        
        
        
                                        } else if (mysqli_num_rows($checktype) == 0){
                                            echo "<br><a href='login.php'><h5 align='center'>Login as a customer to reserve tickets or leave a review</h5></a>";
        }
                                        ?>
        
                                            
            <?php 
                if ( isset($_POST['submit'])) { 
                    
                    $ticket = $_POST['ticket'];
                    
                    $addtickets = ("INSERT INTO `project02_tickets` (`id`, `eventid`, `userid`, `quantity`) VALUES (NULL, '$eventid', '$userid', '$ticket');");
                    $result = $conn->query($addtickets);
                    if (!$result) {
                    echo $conn->error;
                }else{
//                    header("Location: reservations.php");
                }}
                ?>
        
        
        
        
        
        </div>
        <div class='col m2'></div>
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
