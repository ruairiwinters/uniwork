<?php
 session_start();
if (isset($_SESSION["userid_event_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_event_40206636'];
} else {
    $userisset = 'not logged in';
    header("Location: ../login.php");
}
    include('../connections/conn.php');
    
    
    $typeread = "SELECT * FROM project02_type";
    $gettype = $conn->query($typeread);
    if(!$gettype){	
	echo $conn -> error;
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../ui/styles.css">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css"/>
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
        <h1 align='center'>Create an Event</h1> <br>
        
        
        <div class='col m3'></div><div class='col m6'>
        
        
        <form enctype='multipart/form-data' action='' method='POST'>


        <p>Event Name:
       <input type="text" id="name" name="name" value="">
       </p>
       <p>Type: 
           <select id="type" name="type">
               <?php
                while($row1 = $gettype->fetch_assoc()){
                            $typename = $row1['type'];
                            $typeid = $row1['id'];
                        echo "<option value=$typeid>$typename</option>";
                }
               
               
               ?>
           </select>
       </p>
       <p>Venue:
       <input type="text" id="venue" name="venue" value="">
       </p>
       <p>Start Date:
           <input type="date" id="sdate" name="sdate" value="">
       </p>
       <p>End Date:
       <input type="date" id="edate" name="edate" value="">
       </p>
        

       
        <div id='sub'>
            <input name='submit' type='submit' value='Create Event'/>
        </div>
         </form>
            </div><div class='col m3'>
            
            <?php 
                if ( isset($_POST['submit'])) {
                    if(empty($name = $_POST['name'])){
                        echo"Please type in the name<br>";
                    }
                    if(empty($venue = $_POST['venue'])){
                        echo"Please type in the venue<br>";
                    }
                    if(empty($startdate = $_POST['sdate'])){
                        echo"Please type in a startdate<br>";
                    }
                    if(empty($enddate = $_POST['edate'])){
                        echo"Please type in a enddate<br>";
                    }
                    else { 
                    
                    $name = addslashes($_POST['name']);
                    $type = addslashes($_POST['type']);
                    $venue = addslashes($_POST['venue']);
                    $startdate = addslashes($_POST['sdate']);
                    $enddate = addslashes($_POST['edate']);
                    
                    $addquery = ("INSERT INTO `project02_events` (`id`, `eventname`, `typeid`, `venue`, `startdate`, `enddate`, `managerid`) VALUES (NULL, '$name', '$type', '$venue', '$startdate', '$enddate', '$userid');");
                    $result = $conn->query($addquery);
                    if (!$result) {
                    echo $conn->error;
                } else {
                    header("Location: index.php");
                }
            }}
            
            
            
            
            
            ?>
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
