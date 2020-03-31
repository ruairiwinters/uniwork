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
        $viewusers = "SELECT * FROM `project02_publicusers` ORDER BY usertype DESC";
        $readusers = $conn->query($viewusers);
        if (!$readusers) {
            echo $conn->error;
        }else{
        
        while ($rowread = $readusers->fetch_assoc()) {
                            
            $id = $rowread['id'];
            $username = $rowread['username'];
            $password = $rowread['password'];
            $usertype = $rowread['usertype'];

            $checkevents="SELECT * FROM `project02_events` WHERE `managerid` = $id";
            $numevents = $conn->query($checkevents);
                
                    
        
                            if(!$numevents){
                                die($conn->error);
                            }
                            $num = $numevents->num_rows;
                            if ($num >0){
                                
                        if ($id == $userid){
                        echo "<button class='accordion _box _shadow _black'>$username
                            <a href='index.php?userid=$id'>
                                <img src='../img/home.png' style='width: 5%' align='right'>
                            </a>

                    ";
                    } else if ($usertype == 1){
                        echo "<button class='accordion _box _shadow _cream'>$username
                            
                            <a href='promote.php?userid=$id'>
                                <img src='../img/promote.png' style='width: 5%' align='right'>
                            </a>
                            <p style='color:#ffbf00' align='right'>User's events must be removed before user is deleted</p>
                    ";
                    } else if($usertype == 2){
                        echo "<button class='accordion _box _shadow _dark'>$username
                            
                            <a href='promote.php?userid=$id'>
                                <img src='../img/promote.png' style='width: 5%' align='right'>
                            </a>
                            <a href='demote.php?userid=$id'>
                                <img src='../img/demote.png' style='width: 5%' align='right'>
                            </a>
                            <p style='color:#ffbf00' align='right'>User's events must be removed before user is deleted</p>
                    ";
                    } else if ($usertype == 3){
                        echo "<button class='accordion _box _shadow _black'>$username
                            
                            <a href='demote.php?userid=$id'>
                                <img src='../img/demote.png' style='width: 5%' align='right'>
                            </a>
                            <p style='color:#ffbf00' align='right'>User's events must be removed before user is deleted</p>
                    ";
                    }
                            } else if ($num ==0){
                                if ($id == $userid){
                        echo "<button class='accordion _box _shadow _black'>$username
                            <a href='index.php?userid=$id'>
                                <img src='../img/home.png' style='width: 5%' align='right'>
                            </a>

                    ";
                    } else if ($usertype == 1){
                        echo "<button class='accordion _box _shadow _cream'>$username
                            <a href='deleteuser.php?userid=$id'>
                                <img src='../img/bin.png' style='width: 5%' align='right'>
                            </a>
                            <a href='promote.php?userid=$id'>
                                <img src='../img/promote.png' style='width: 5%' align='right'>
                            </a>

                    ";
                    } else if($usertype == 2){
                        echo "<button class='accordion _box _shadow _dark'>$username
                            <a href='deleteuser.php?userid=$id'>
                                <img src='../img/bin.png' style='width: 5%' align='right'>
                            </a>
                            <a href='promote.php?userid=$id'>
                                <img src='../img/promote.png' style='width: 5%' align='right'>
                            </a>
                            <a href='demote.php?userid=$id'>
                                <img src='../img/demote.png' style='width: 5%' align='right'>
                            </a>

                    ";
                    } else if ($usertype == 3){
                        echo "<button class='accordion _box _shadow _black'>$username
                            <a href='deleteuser.php?userid=$id'>
                                <img src='../img/bin.png' style='width: 5%' align='right'>
                            </a>
                            <a href='demote.php?userid=$id'>
                                <img src='../img/demote.png' style='width: 5%' align='right'>
                            </a>

                    ";
                    } 
                            }
                    




            echo"
                </button>
                    <div class='-panel'>
                        <p>Usertype: ";
                    
                    if ($usertype == 1){
                        echo "Public User";
                    } else if($usertype == 2){
                        echo "Event Manager";
                    } else if ($usertype == 3){
                        echo "Website Admin";
                    }
                echo "</p>
                        <p>Password: $password</p>
                    </div>";
                       
        }}
            ?>
        </div><div class='col m1'></div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
