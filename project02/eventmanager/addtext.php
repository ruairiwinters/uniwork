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
        
            
       <h1 align='center'>Add Text</h1> <br>
       
        
        <div class='col m3'></div><div class='col m6'>
        
        <form enctype='multipart/form-data' action='' method='POST'>

       <p>Text:
       <textarea name="text" cols="50" rows="10"></textarea>
       </p>
       <p>Position: 
           <select id="position" name="position">
               <option value='Top'>Top</option>
               <option value='Middle'>Middle</option>
               <option value='Bottom'>Bottom</option>
               <option value='Urgent'>Urgent</option>
           </select>
       </p><div id='sub'>
            <input name='submit' type='submit' value='Add Text'/>
        </div>
        </form><br><br><br><br>
          
            
            
            
            <?php 
                if ( isset($_POST['submit'])) {
                    if(empty($text = $_POST['text'])){
                        echo"Please type in text<br>";
                    } else { 
                    
                    $text = addslashes($_POST['text']);
                    $position = addslashes($_POST['position']);
                    
                    $insertquery = ("INSERT INTO `project02_eventtext` (`id`, `text`, `position`, `eventid`) VALUES (NULL, '$text', '$position', '$eventid');");
                    $result = $conn->query($insertquery);
                    if (!$result) {
                    echo $conn->error;
                } 
                
                header("Location: text.php?eventid=$eventid");
                }}
            
            
            
            
            
            ?>
        
        </div><div class='col m3'></div>
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
