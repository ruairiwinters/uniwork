<?php
 session_start();
if (isset($_SESSION["userid_admin_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_admin_40206636'];
    
    
    include('../connections/conn.php');
    $id = $_GET['userid'];
    
    $viewusers = "SELECT * FROM `project02_publicusers` WHERE id = $id";
    $readusers = $conn->query($viewusers);
        if (!$readusers) {
            echo $conn->error;
        }else{
        while ($rowread = $readusers->fetch_assoc()) {
                            
            $id = $rowread['id'];
            $username = $rowread['username'];
            $password = $rowread['password'];
            $usertype = $rowread['usertype'];
        }
            if($usertype == '3'){
                $newtype = '2';
            } else if ($usertype == '2'){
                $newtype = '1';
            }
        }
        
    
   
    
    
    
    $demotequery = "UPDATE `project02_publicusers` SET `usertype` = '$newtype' WHERE `project02_publicusers`.`id` = $id";
    $conn->query($demotequery);
    header("Location: users.php");                        
    
    
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
                <li><a href="index.php" class="brand">Administration Page</a></li>
                <li> <a href='../viewaccount.php'>View Account</a> </li>  
                <li class="-icon">
                   <a href="javascript:void(0);" onclick="topnav('myTopnav2')">Menu</a>
                </li>
            </ul>
             
        </nav>    
        
        <!---Header--->    
        
        <?PHP
        $id = $_GET['eventid'];
        echo"<h1>$id</h1>"
        ?>
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
