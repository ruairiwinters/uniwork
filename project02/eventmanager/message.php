<?php
 session_start();
if (isset($_SESSION["userid_event_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_event_40206636'];
    
    
    include('../connections/conn.php');
    $eventid = $_GET['eventid'];
    
    
    
    
    
    
}
 else {
    $userisset = 'not logged in';
    header("Location: ../login.php");
}
    include('../connections/conn.php');

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../ui/styles.css">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <title>Bel-Festival</title>
    </head>
    <body>
        <nav>
            <ul class="topnav " id="myTopnav2">
                <li><a href="index.php" class="brand">Event Management Page</a></li>
                <li> <a href='../viewaccount.php'>View Account</a> </li>  
                <li class="-icon">
                   <a href="javascript:void(0);" onclick="topnav('myTopnav2')">Menu</a>
                </li>
            </ul>
             
        </nav>    
        
        <!---Header--->    
        
            
       <h1 align='center'>Send a message to all ticket reservers</h1> <br>
       
        
        <div class='col m3'></div><div class='col m6'>
        
        <form enctype='multipart/form-data' action='' method='POST'>

       <p>Subject:
       <input type="text" id="subject" name="subject" value="">
       </p>
       <p>Text:
       <textarea name="text" cols="50" rows="10"></textarea>
       </p>
       
            <input name='submit' type='submit' value='Send'/>
        </div>
        </form><br><br><br><br>
          
            
            
            
            <?php 
                if ( isset($_POST['submit'])) { 
                    if(empty($text = $_POST['text'])){
                        echo"Please type in text<br>";
                    }
                    if(empty($subject = $_POST['subject'])){
                        echo"Please type in a subject <br>";
                    } else {
                    
                    $text = $_POST['text'];
                    $subject = $_POST['subject'];
                $getreceivers = "SELECT * FROM `project02_tickets` WHERE `eventid` = $eventid";
                $viewreceivers = $conn->query($getreceivers);
                    if (!$getreceivers) {
                    echo $conn->error;
                } 
                 while ($rowread = $viewreceivers->fetch_assoc()) {
                            
                $receiverid = $rowread['userid'];
                $date = date("D M d, Y G:i");
                    $insertquery = ("INSERT INTO `project02_messages`(`id`, `eventid`, `receiverid`, `subject`, `text`, `date`) VALUES (NULL,'$eventid','$receiverid','$subject','$text','$date')");
                    $result12 = $conn->query($insertquery);
                    if (!$result12) {
                    echo $conn->error;
                } 
                
                
            }
            
            header("Location: myevents.php?userid=$userid");
            
            
                }}
            ?>
        
        </div><div class='col m3'></div>
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
