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
        $viewusers = "SELECT * FROM `project02_passwordresets`";
        $readusers = $conn->query($viewusers);
        if (!$readusers) {
            echo $conn->error;
        }
        $num = $readusers->num_rows;
                            if ($num ==0){
                                echo"<h5 align='center'> No Users Require A Password Reset </h5>";
                            } 
        else{
            echo"<h5 align='center'> All Passwords Are Reset To: password  </h5>";
        
        while ($rowread = $readusers->fetch_assoc()) {
                            
            $id = $rowread['id'];
            $userid = $rowread['userid'];

            $getdetails="SELECT * FROM `project02_publicusers` WHERE `id` = $userid";
            $details = $conn->query($getdetails);
            while ($rowread = $details->fetch_assoc()) {
                $username = $rowread['username'];
                $password = $rowread['password'];
                $usertype = $rowread['usertype'];
            
                
                        echo "<button class='accordion _box _shadow _dark'>$username
                            <a href='reset.php?userid=$userid'>
                                <img src='../img/reset1.png' style='width: 10%' align='right'>
                            </a>
                        </button>
                    <div class='-panel'>
                        <p>Usertype: ";

            if ($usertype == 1) {
                echo "Public User";
            } else if ($usertype == 2) {
                echo "Event Manager";
            } else if ($usertype == 3) {
                echo "Website Admin";
            }
            echo "</p>
                        <p>Password: $password</p>
                    </div>";
        }
        }}
?>
        </div><div class='col m1'></div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
