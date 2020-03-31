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
            <br>
            <div align="center"><a href='addtype.php'><button class="_xlarge _black">Add Type</button></a></div>
            <br>
            
            
        <?php
        $viewtext = "SELECT * FROM `project02_type`";
        $readtext = $conn->query($viewtext);
        if (!$readtext) {
            echo $conn->error;
        }
        
        while ($rowread = $readtext->fetch_assoc()) {
                            
            $id = $rowread['id'];
            $type = $rowread['type'];
            $image = $rowread['imagepath'];
            
        $getevent = "SELECT * FROM project02_events WHERE typeid=$id";
        $readevent = $conn->query($getevent);
        if (!$readevent) {
            echo $conn->error;
        }
        
        $num = $readevent->num_rows;
                            if ($num >0){
        
        echo"  <button class='accordion _box _shadow _black'>$type
                        <a href='edittype.php?type=$id'>
                            <img src='../img/edit.png' style='width: 5%' align='right'>
                        </a>
                        <p style='color:#ffbf00' align='right'>Event's must be removed before type can be deleted</p>
                    </button>
                <div class='-panel'>";
        
        while ($rowread = $readevent->fetch_assoc()) {
            $eventname = $rowread['eventname'];
        

            echo"
                    <p>$eventname</p>";
                       
        } echo"</div>";
        
        } else {
            echo"  <button class='accordion _box _shadow _black'>$type
                        <a href='edittype.php?type=$id'>
                            <img src='../img/edit.png' style='width: 5%' align='right'>
                        </a>
                        <a href='deletetype.php?typeid=$id'>
                            <img src='../img/bin.png' style='width: 5%' align='right'>
                        </a>
                        
                    </button>
                <div class='-panel'>";
        
        while ($rowread = $readevent->fetch_assoc()) {
            $eventname = $rowread['eventname'];
        

            echo"
                    <p>$eventname</p>";
                       
        } echo"</div>";
        }}
            ?>
        </div><div class='col m1'></div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
