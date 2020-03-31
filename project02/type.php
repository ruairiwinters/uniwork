<?php
 session_start();
if (isset($_SESSION["userid_40206636"])) {
    $userisset = 'logged in';
    $userid = $_SESSION['userid_40206636'];
} else {
    $userisset = 'not logged in';
}
    include('connections/conn.php');
    
    $type = $conn -> real_escape_string($_GET['type']);
    
    $nav_read = "SELECT * FROM project02_type";
    $gettype = $conn->query($nav_read);
    if(!$gettype){	
	echo $conn -> error;
    }
     
    $event_read = "SELECT * FROM project02_events WHERE typeid='$type' ";
        $getevent = $conn->query($event_read);
        if(!$getevent){	
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
        
        
        
        
        
        <div class='col m2'></div><div class='col m8'>
        <?php
        $type_read = "SELECT * FROM project02_type WHERE id='$type' ";
        $gettypeimg = $conn->query($type_read);
        if(!$gettypeimg){	
            echo $conn -> error;	
        }
        while ($rowread = $gettypeimg->fetch_assoc()) {
                            
            $id = $rowread['id'];
            $typename101 = $rowread['type'];
            $filename = $rowread['imagepath'];}
        
            echo"<div class=\"bg-parallax\" style=\"background-image: url('typeimg/$filename'); \">
                            <div class=\"-front\">
                                <h3 class=\"_alignCenter\" style=\"padding: 50px; color: black\">$typename101</h3>
                            </div>
                        </div>"
                                    ?>
            
            
            
            
            
        <div class='container'>
                <?php
                    while($row = $getevent->fetch_assoc()){
			$eventtitle = $row["eventname"];
                        $eventid = $row["id"];
                    echo    "<a href= 'event.php?name=$eventid'>
				<div class='box3'>
                                    <h4 align='center'>$eventtitle</h4>
                                </div></a>";
                    }     
		?>
            </div>
        </div><div class='col m2'>
        <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
