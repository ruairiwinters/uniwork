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
    $id = $_GET['eventid'];

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
                $eventname = "SELECT `eventname` FROM `project02_events` WHERE id = $id";
                $readname = $conn->query($eventname);
            if (!$readname) {
            echo $conn->error;
            }else{
            while ($rowread = $readname->fetch_assoc()) {
                            
            $eventname = $rowread['eventname'];
            echo"<h1 align='center'>Add an act to $eventname</h1> <br>";}}
            
            ?>
            <?php echo "<div align='center'><a href='createact.php?eventid=$id'><button class='_xlarge _black'>Create an Act</button></a></div>";?>
            <br>
            
            
        <?php
        $eventid = $_GET['eventid'];
        $viewacts = "SELECT * FROM project02_acts";
        $readacts = $conn->query($viewacts);
        if (!$readacts) {
            echo $conn->error;
        }
            while ($rowread = $readacts->fetch_assoc()) {
                $actid = $rowread['id'];
                $check = "SELECT * FROM `project02_actseventslink` WHERE project02_actseventslink.eventid = $eventid && project02_actseventslink.actid = $actid";
                $result = $conn->query($check);
                $num = $result->num_rows;
                            if ($num <=0){
                                
                                
                $getdetails = "SELECT * FROM `project02_acts` WHERE id= $actid";
                $readdetails = $conn->query($getdetails);
        if (!$readdetails) {
            echo $conn->error;
        }
            while ($rowread = $readdetails->fetch_assoc()) {
                $actid = $rowread['id'];
                $name = $rowread['name'];
                $description = $rowread['description'];
                $typeid = $rowread['typeid'];
                
            echo "<button class='accordion _box _shadow _black'>$name
                        <a href='addtoevent.php?actid=$actid&eventid=$eventid'>
                            <img src='../img/add.png' style='width: 5%' align='right'>
                        </a>
                        
                    </button>
                    <div class='-panel'>
                            <p>Description: $description</p>";
            $viewtype = "SELECT project02_type.type FROM project02_type WHERE project02_type.id = $typeid";
        $readtype = $conn->query($viewtype);
        if (!$readtype) {
            echo $conn->error;
        }else{
        
        while ($rowread = $readtype->fetch_assoc()) {
            $typename = $rowread['type'];
        
                        echo"<p>Type: $typename </p>
                        </div>";
                       
        }}
            }}}

                    
                
                
                
               
            ?>
        </div><div class='col m1'></div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
