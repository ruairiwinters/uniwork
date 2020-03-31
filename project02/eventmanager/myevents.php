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
        <div class='col m1'></div>
        <div class='col m10'>
        <?php
        $countevents = "SELECT * FROM `project02_events` WHERE managerid = $userid";
        $result = $conn->query($countevents);
                            if(!$result){
                                die($conn->error);
                            }
                            $num = $result->num_rows;
                            if ($num >1){
                                $username = "SELECT `username` FROM `project02_publicusers` WHERE id = $userid";
                $readname = $conn->query($username);
            if (!$readname) {
            echo $conn->error;
            }else{
            while ($rowread = $readname->fetch_assoc()) {
                            
            $username = $rowread['username'];
            echo"<h1 align='center'>$username's Events</h1> <br>";}}
                            } else {
                                $username = "SELECT `username` FROM `project02_publicusers` WHERE id = $userid";
                $readname = $conn->query($username);
            if (!$readname) {
            echo $conn->error;
            }else{
            while ($rowread = $readname->fetch_assoc()) {
                            
            $username = $rowread['username'];
            echo"<h1 align='center'>$username's Event</h1> <br>";}}
                            }
        
        ?>
           
            
            
            
            
        <?php
        $viewevent = "SELECT project02_events.id, project02_events.eventname, project02_events.venue, project02_events.startdate, project02_events.enddate, project02_type.type, project02_events.managerid FROM `project02_events` INNER JOIN project02_type ON project02_events.typeid = project02_type.id WHERE project02_events.managerid = $userid";
        $readevent = $conn->query($viewevent);
        if (!$readevent) {
            echo $conn->error;
        }else{
        
        while ($rowread = $readevent->fetch_assoc()) {
                            
            $id = $rowread['id'];
            $name = $rowread['eventname'];
            $venue = $rowread['venue'];
            $startdate = $rowread['startdate'];
            $enddate = $rowread['enddate'];
            $type = $rowread['type'];

            echo"<button class='accordion _box _shadow _dark'>$name
                <a href='download.php?eventid=$id'>
                    <img src='../img/download.png' style='width: 5%' align='right'>
                </a>
                <a href='addimg.php?eventid=$id'>
                    <img src='../img/editimg.png' style='width: 5%' align='right'>
                </a>
                <a href='message.php?eventid=$id'>
                    <img src='../img/message.png' style='width: 5%' align='right'>
                </a>
                <a href='text.php?eventid=$id'>
                    <img src='../img/edittext.png' style='width: 5%' align='right'>
                </a>
                <a href='deleteevent.php?eventid=$id'>
                    <img src='../img/bin.png' style='width: 5%' align='right'>
                </a>
                <a href='editevent.php?eventid=$id'>
                    <img src='../img/edit.png' style='width: 5%' align='right'>
                </a>
                </button>
                    <div class='-panel'>
                    <div class='col m6'>
                        <p>Festival Type: $type</p>
                        <p>Venue: $venue</p>
                        <p>Start Date: $startdate</p>
                        <p>End Date: $enddate</p>";
        
        $viewtickets = "SELECT SUM(quantity) FROM project02_tickets WHERE eventid = $id";
        $count = $conn->query($viewtickets);
        if (!$count) {
            echo $conn->error;
        }else{
        
        while ($rowread = $count->fetch_assoc()) {
            
            $quantity = $rowread['SUM(quantity)'];
            
            if ($quantity == null){
                echo "<h6>No Tickets Sold Yet</h6>
                    </div>
                    <div class='col m6'>
        <h5>Acts Attending</h5>";
            } else{
            echo" <h6>Tickets Sold: $quantity</h6>
                    </div>
                    <div class='col m6'>
        <h5>Acts Attending</h5>";}}
            
            
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
                       
        }}}
            ?>
        </div><div class='col m1'></div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
