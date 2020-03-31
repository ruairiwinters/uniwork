<?php 
    session_start();
if (isset($_SESSION["userid_40206636"])) {
    $userisset = 'logged in';
    $userid = $_SESSION['userid_40206636'];
} else {
    $userisset = 'not logged in';
    header("Location: login.php");
}

include('connections/conn.php');
    
    $type_read = "SELECT * FROM project02_type";
    $gettype = $conn->query($type_read);
    if(!$gettype){	
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
        
         <div class='col m1'></div><div class='col m10'>
        <h1>Ticket Reservations </h1>
        
        <?php
        $checkusertype = "SELECT usertype FROM `project02_publicusers` WHERE id = '$userid' AND usertype = '1'";
                                        $checktype = $conn->query($checkusertype);
                                        if (mysqli_num_rows($checktype) > 0) {
                                            $_SESSION["userid_40206636"] = $userid;
                                            
    $viewevent = "SELECT project02_events.id, project02_events.eventname, project02_events.venue, project02_events.startdate, project02_events.enddate, project02_type.type, project02_tickets.quantity FROM `project02_events` INNER JOIN project02_type ON project02_events.typeid = project02_type.id INNER JOIN project02_tickets ON project02_events.id = project02_tickets.eventid WHERE project02_tickets.userid = $userid";
    $readevent = $conn->query($viewevent);
    if (!$readevent) {
        echo $conn->error;
    } else if  (mysqli_num_rows($readevent) == 0) {
            echo "<h5>You have no tickets reserved</h5>
                    <br>
                    <a href='index.php'><h6>Click here to view events</h6></a>";
    
    }else {

        while ($rowread = $readevent->fetch_assoc()) {

            $id = $rowread['id'];
            $name = $rowread['eventname'];
            $venue = $rowread['venue'];
            $startdate = $rowread['startdate'];
            $enddate = $rowread['enddate'];
            $type = $rowread['type'];
            $quantity = $rowread['quantity'];
            
            echo"<button class='accordion _box _shadow _dark'>$name 
                <a href='deletereservation.php?eventid=$id'>
                    <img src='img/bin.png' style='width: 5%' align='right'>
                </a>
                </button>
                
                    <div class='-panel'>
                    <div class='col m6'>
                        <p>Festival Type: $type</p>
                        <p>Venue: $venue</p>
                        <p>Start Date: $startdate</p>
                        <p>End Date: $enddate</p>
                            <br>
                        <h5>Tickets Reserved: $quantity</h5>
                    
                    </div>
                    <div class='col m6'>
                        <h5>Acts Attending</h5>";
                $viewacts = "SELECT * FROM project02_acts INNER JOIN project02_actseventslink ON project02_acts.id = project02_actseventslink.actid WHERE project02_actseventslink.eventid = $id";
            $readacts = $conn->query($viewacts);
            if (!$readacts) {
            echo $conn->error;
            }else{
        
            while ($rowread = $readacts->fetch_assoc()) {
                            
            $id = $rowread['id'];
            $name = $rowread['name'];
            
            echo"<p>$name</p>";}}?>
            
            
            <?php echo "         
                    </div>     
                    </div>";
            
            
            
            
            
            
            
                                        }}} else{
                                            header("Location: login.php");
                                        }
        
        ?>
       
            <?php 
                        if(isset($_POST['logout'])){
                        session_destroy();
                        header("Location: index.php");
                        }
                        ?>
        
                
                
                
            </div>
         <div class='col m1'></div>
    <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
