<?php
 session_start();
if (isset($_SESSION["userid_admin_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_admin_40206636'];
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
                <li><a href="index.php" class="brand">Administration Page</a></li>
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
        $viewevent = "SELECT project02_events.id, project02_events.eventname, project02_events.venue, project02_events.startdate, project02_events.enddate, project02_events.managerid, project02_type.type FROM `project02_events` INNER JOIN project02_type ON project02_events.typeid = project02_type.id";
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
            $managerid = $rowread['managerid'];
            

            echo"<button class='accordion _box _shadow _dark'>$name
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
                        <p>End Date: $enddate</p>
                    ";
                            

        $viewmanagerid = "SELECT project02_publicusers.username FROM project02_publicusers INNER JOIN project02_events ON project02_publicusers.id = project02_events.managerid WHERE project02_events.managerid = $managerid GROUP BY project02_publicusers.username";
        $readmanager = $conn->query($viewmanagerid);
        if (!$readmanager) {
            echo $conn->error;
        }else{
        while ($rowread = $readmanager->fetch_assoc()) {
            $managername = $rowread['username'];
        
        echo"<p>Event Manager: $managername</p>";}}
                
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
        <h5>Acts Attending</h5>";}}}
                
                
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
                       
        }}
            ?>
        </div><div class='col m1'></div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
