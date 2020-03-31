<?php
 session_start();
if (isset($_SESSION["userid_event_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_event_40206636'];
    
    
    
    include('../connections/conn.php');
    $id = $_GET['eventid'];
    $viewevent = "SELECT project02_events.id, project02_events.eventname, project02_events.venue, project02_events.startdate, project02_events.enddate, project02_type.type FROM `project02_events` INNER JOIN project02_type ON project02_events.typeid = project02_type.id WHERE project02_events.id = $id";
        $readevent = $conn->query($viewevent);
        if (!$readevent) {
            echo $conn->error;
        }
        
    $typeread = "SELECT * FROM project02_type";
    $gettype = $conn->query($typeread);
    if(!$gettype){	
	echo $conn -> error;
    }
    
}else {
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
        
        <?PHP
        while ($rowread = $readevent->fetch_assoc()) {
                            
            $id = $rowread['id'];
            $name = $rowread['eventname'];
            $venue = $rowread['venue'];
            $startdate = $rowread['startdate'];
            $enddate = $rowread['enddate'];
            $type = $rowread['type'];

        echo"<h1 align='center'>$name</h1> <br>";}
        ?>
        <?php     
        echo "<div align='center'><a href='acts.php?eventid=$id'><button class='_xlarge _cream'>Edit the Acts Attendance</button></a></div>
            <br>";
        ?>
        
        
        
        <div class='col m3'></div><div class='col m6'>
        
        <form enctype='multipart/form-data' action='' method='POST'>


        <p>Event Name:
       <input type="text" id="name" name="name" value="<?php echo $name ?>">
       </p>
       <p>Type: 
           <select id="type" name="type"><?php echo $type ?>
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
       <input type="text" id="venue" name="venue" value="<?php echo $venue ?>">
       </p>
       <p>Start Date:
           <input type="date" id="sdate" name="sdate" value="<?php echo $startdate ?>">
       </p>
       <p>End Date:
       <input type="date" id="edate" name="edate" value="<?php echo $enddate ?>">
       </p>
        

       
        <div id='sub'>
            <input name='submit' type='submit' value='Update Event'/>
        </div>
         </form>
            
            <?php 
                if ( isset($_POST['submit'])) { 
                    
                    $name = addslashes($_POST['name']);
                    $type = addslashes($_POST['type']);
                    $venue = addslashes($_POST['venue']);
                    $startdate = addslashes($_POST['sdate']);
                    $enddate = addslashes($_POST['edate']);
                    
                    $updatequery = ("UPDATE `project02_events` SET `eventname`= '$name',`typeid`= '$type',`venue`='$venue',`startdate`='$startdate',`enddate`='$enddate' WHERE id = $id");
                    $result = $conn->query($updatequery);
                    if (!$result) {
                    echo $conn->error;
                } else {
                    header("Location: myevents.php");
                }
            }
            ?>
        
            
             
            
            
            
            
        </div><div class='col m3'></div>
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
