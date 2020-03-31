<?php 
 session_start();
if (isset($_SESSION["userid_40206636"])) {
    $userisset = 'logged in';
    $userid = $_SESSION['userid_40206636'];
} else {
    $userisset = 'not logged in';
}
    include('connections/conn.php');
    
    $type_read = "SELECT * FROM project02_type";
    $gettype = $conn->query($type_read);
    if(!$gettype){	
	echo $conn -> error;	
    }
    
    $event_read = "SELECT * FROM project02_events";
    $getevent = $conn->query($event_read);
    if(!$getevent){	
	echo $conn -> error;	
    }
    
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
        
        
        
        <div class='col m2'></div><div class='col m8'>
            <h1 align='center' style='font-weight:bold'> BEL-FESTIVAL </h1><br>
        
        <?php
        $checkurgent = "SELECT * FROM `project02_homepage` WHERE `position` = 'Urgent'";
        $geturgent = $conn->query($checkurgent);
        if(!$geturgent){	
            echo $conn -> error;	
        }
        echo"<h4 align='center' style='color:red; font-weight:bold'>URGENT NEWS</h4>";
        while ($row = $geturgent->fetch_assoc()) {
                    $text = $row["text"];
                    echo "<div class='box5'>
                            <h5 align='center' align='middle'>$text</h4>
                        </div><br>"          ;}
        ?>
        
        <?php
        $checktop = "SELECT * FROM `project02_homepage` WHERE `position` = 'Top'";
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
        
        
        
            <br><div class="bg-parallax" style="background-image: url('img/k-mitch-hodge-MBzG8vuv2Og-unsplash.jpg'); ">
                            <div class="-front">
                                <h4 class="_alignCenter" style="padding: 50px; color: black">DISCOVER MORE...</h4>
                            </div>
                        </div>
            
        
            <?php
        $checkmiddle = "SELECT * FROM `project02_homepage` WHERE `position` = 'Middle'";
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
            
            
            
            
            <br>
        
            
        <div class='box4'>
                            <h4 align='center' align='middle'>All events are located in and around Belfast.</h4>
                        </div>
            
                <iframe align=middle  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d147936.67487384516!2d-6.066716474137954!3d54.594998050654866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4860fffdd7d08a3b%3A0x2e57162cefc7c531!2sBelfast!5e0!3m2!1sen!2suk!4v1585142568608!5m2!1sen!2suk" frameborder="0" width="100%" height="500px" align="center" allowfullscreen="" ></iframe>
                <br><br><br>    
            
            
            
        <div> 	
            <div>
                <h2 align='center'>Events coming up... </h2>
                <div class='container'> 
                <?php
                while ($row = $getevent->fetch_assoc()) {
                    $eventtitle = $row["eventname"];
                    $eventid = $row["id"];
                    echo    "<a href= 'event.php?name=$eventid'>
				<div class='box3'>
                                    <h4 align='center' align='middle'>$eventtitle</h4>
                                </div></a>";
                }
                ?>
                </div>
            </div>
            
            <?php
        $checkbottom = "SELECT * FROM `project02_homepage` WHERE `position` = 'Bottom'";
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
            
            
        </div>
        </div><div class='col m2'></div>
    <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
