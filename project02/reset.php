<?php 
    session_start();
    include('connections/conn.php');
if (isset($_SESSION["userid_40206636"])) {
    $userisset = 'logged in';
    $userid = $_SESSION['userid_40206636'];
    header("Location: viewaccount.php");
    
} else {
    $userisset = 'not logged in';
    $username = $_GET['username'];
    $findid = "SELECT * FROM `project02_publicusers` WHERE `username` = '$username'";
    $readusers = $conn->query($findid);
        if (!$readusers) {
            echo $conn->error;
        }else{
        while ($rowread = $readusers->fetch_assoc()) {
            $id = $rowread['id'];
            
            $requestreset = "INSERT INTO `project02_passwordresets`(`id`, `userid`) VALUES (NULL, '$id')";
            $getreset = $conn->query($requestreset);
            if(!$getreset){	
                echo $conn -> error;	
            }
            header("Location: viewaccount.php");
}}  
    }


    
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
                        } 
                    ?>
                    
                </ul>
            </div>
        </nav>

        
        
    <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
