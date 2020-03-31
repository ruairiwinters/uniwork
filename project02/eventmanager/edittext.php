<?php
 session_start();
if (isset($_SESSION["userid_event_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_event_40206636'];
    
    
    include('../connections/conn.php');
    $id = $_GET['textid'];
    
    $viewtext = "SELECT * FROM `project02_eventtext` WHERE id = $id";
    $readtext = $conn->query($viewtext);
        if (!$readtext) {
            echo $conn->error;
        }
    
    
    
    
    
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
        
            
       <?PHP
        while ($rowread = $readtext->fetch_assoc()) {
                            
            $actid = $rowread['id'];
            $text = $rowread['text'];
            $position = $rowread['position'];

        echo"<h1 align='center'>Edit the Text</h1> <br>";}
        ?>
        
        <div class='col m3'></div><div class='col m6'>
        
        <form enctype='multipart/form-data' action='' method='POST'>

       <p>Text:
       <textarea name="text" cols="50" rows="10"><?php echo "$text";?></textarea>
       </p>
       <p>Position: 
           <select id="position" name="position"><?php echo $position ?>
               <option value='Top'>Top</option>
               <option value='Middle'>Middle</option>
               <option value='Bottom'>Bottom</option>
               <option value='Urgent'>Urgent</option>
           </select>
       </p><div id='sub'>
            <input name='submit' type='submit' value='Update Text'/>
        </div>
        </form><br><br><br><br>
          
            
            
            
            <?php 
                if ( isset($_POST['submit'])) {
                    $geteventid = "SELECT * FROM `project02_eventtext` WHERE `id` = $id";
                    $viewevent = $conn->query($geteventid);
                        if (!$viewevent) {
                            echo $conn->error;
                        }
                    while ($rowread = $viewevent->fetch_assoc()) {
                        $eventid = $rowread['eventid'];

                    $text = addslashes($_POST['text']);
                    $position = addslashes($_POST['position']);
                    
                    $updatequery = ("UPDATE `project02_eventtext` SET `text`= '$text',`position`='$position' WHERE id = $id");
                    $result = $conn->query($updatequery);
                    if (!$result) {
                    echo $conn->error;
                } 
                
                header("Location: text.php?eventid=$eventid");
                }}?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
