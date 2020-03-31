<?php 
    session_start();
if (isset($_SESSION["userid_40206636"])) {
    $userisset = 'logged in';
    $userid = $_SESSION['userid_40206636'];
    header("Location: viewaccount.php");
    
} else {
    $userisset = 'not logged in';
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
                        } 
                    ?>
                    
                </ul>
            </div>
        </nav>
        
        
        
                    <?php 
                    if($userisset == 'not logged in'){
                        echo "<h1> Login </h1>
                            <div class='container'> 	
                            <div id='content'>
                            <form method='POST' action='login.php'>
                                <input type='text' name='username'/>
                                <input type='password' name='password'/>
                                <input type='submit' value='Login' name='signin' />
                            </form>";
                    } 
                    ?>
        
                
                <?php 
                        if(isset($_POST['signin'])){
                            if(empty($username = $_POST['username'])){
                                echo"Please type a username";
                            }
                            include("connections/conn.php");
                            $username = addslashes($_POST['username']);
                            $password = addslashes($_POST['password']);
                            
                            $checkuser = "SELECT * FROM project02_publicusers WHERE username = '$username' AND password = '$password'";
                            $result = $conn->query($checkuser);
                            if(!$result){
                                die($conn->error);
                            }
                            $num = $result->num_rows;
                            if ($num >0){
                                
                                while ($row = $result->fetch_assoc()){
                                    $userid = $row["id"];
                                    $_SESSION["userid_40206636"] = $userid;
                                }
                                header("Location: viewaccount.php?userid=$userid");
                            } 
                            else{
                                $checkifuserexists="SELECT * FROM `project02_publicusers` WHERE `username` = '$username'";
                                $numusers = $conn->query($checkifuserexists);
                                while ($rowread = $numusers->fetch_assoc()) {
                                    $uid = $rowread['id'];}
                                if(!$numusers){
                                    die($conn->error);
                                }
                            $num = $numusers->num_rows;
                            if ($num ==0){
                                echo "<p>There is no account matching the name $username</p>";
                            } else if($num>0){
                                $checkforreset = "SELECT * FROM `project02_passwordresets` WHERE `userid` ='$uid'";
                                $numreset = $conn->query($checkforreset);
                                if(!$numreset){
                                    die($conn->error);
                                }
                            $num2 = $numreset->num_rows;
                            if ($num2 ==0){
                                echo "<p>Password is incorrect.</p>";
                                echo "<p><a href='reset.php?username=$username'>Click here to reset password.</a></p>";
                            } else if ($num2 >0){
                                echo "<p>Admin is yet to reset password.</p>";
                            }
                        }
                        }}
                            
                    ?>
                
        
        <a href='register.php'><p>Don't have an account, click here to register</p></a>
            </div>
        </div>
    <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
