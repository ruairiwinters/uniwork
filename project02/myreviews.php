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
        <h1>My Reviews </h1>
        
        <?php
        $checkusertype = "SELECT usertype FROM `project02_publicusers` WHERE id = '$userid' AND usertype = '1'";
                                        $checktype = $conn->query($checkusertype);
                                        if (mysqli_num_rows($checktype) > 0) {
                                            $_SESSION["userid_40206636"] = $userid;
                                            
    $viewreviews = "SELECT * FROM `project02_reviews` WHERE userid = $userid";
    $readreviews = $conn->query($viewreviews);
    if (!$readreviews) {
        echo $conn->error;
    } else if  (mysqli_num_rows($readreviews) == 0) {
            echo "<h5>You have left no reviews</h5>
                    <br>";
    
    }else {

        while ($rowread = $readreviews->fetch_assoc()) {

            $id = $rowread['id'];
            $eventid = $rowread['eventid'];
            $review = $rowread['review'];
            
            $getusername="SELECT * FROM project02_events WHERE id = $eventid";
            $readname = $conn->query($getusername);
            if (!$readname) {
                echo $conn->error;
            } while ($rowread = $readname->fetch_assoc()) {

            $name = $rowread['eventname'];
            
            echo"<button class='accordion _box _shadow _dark'>$name
                <a href='deletereviews.php?reviewid=$id'>
                    <img src='img/bin.png' style='width: 5%' align='right'>
                </a>
                </button>
                
                    <div class='-panel'>
                        <p>Review: $review</p>    
                    </div>";
            
            
            
            
            
            
            
                                        }}}} else{
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
