<?php
 session_start();
if (isset($_SESSION["userid_40206636"])) {
    $userisset = 'logged in';
    $userid = $_SESSION['userid_40206636'];
    
} else {
    $userisset = 'not logged in';
    $userid = '0';
}
    include('connections/conn.php');
    
    $id = $_GET['actid'];
    $eventid = $_GET['eventid'];
    
    $nav_read = "SELECT * FROM project02_type";
    $gettype = $conn->query($nav_read);
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
        <div class='col m2'><?php echo"<a href='event.php?name=$eventid'><img src='img/back.png' width=40%></a>";?></div>
        <div class='col m8'>
            
            <?php
                $readact = "SELECT * FROM project02_acts WHERE id = $id";
                    $getact = $conn -> query($readact);
                    if (!$getact) {
                        echo $conn->error;
                    }
                    while ($rowread = $getact->fetch_assoc()) {     
            $actid = $rowread['id'];
            $name = $rowread['name'];
            $description = $rowread['description'];
            $type = $rowread['typeid'];

        echo"<h1 align='center'>$name</h1> <br>";
        echo "<br><div class='box4'>
                            <h5 align='center' align='middle'>$description</h4>
                        </div><br>";
                    }
        
        $getimg = "SELECT `filename` FROM `project02_actimg` WHERE `actid` = $actid";
        $readimg = $conn->query($getimg);
    if(!$readimg){	
	echo $conn -> error;	
    } while ($rowread = $readimg->fetch_assoc()) {
        $imagedata = $rowread['filename'];
        
            echo "<div class='col m4'>
                        <img class='modalimg' id='imgu/$imagedata' src='actimg/$imagedata' 
                             width='300' height='200' onclick='openimg(\"imgu/$imagedata\",\"imgb/$imagedata\")'>

                        <div id='imgb/$imagedata' class='modal'>
                            <span class='-close'>✖</span>
                            <img class='modal-content'>
                            <div class='caption'></div>
                            </div>
    </div>";}
        
        
        
        
        ?>
        <div class='col m2'></div>
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
