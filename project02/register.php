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
        
        <h1>Register for an Account</h1>
        
        <div class='container'> 	
                            <div id='content'>
                                <form method='POST' action='register.php'>
                                <p>Username: <input type='text' name='username' /></p>
                                <p>Password: <input type='password' name='password'/></p>
                                <p>Comfirm Password: <input type='password' name='cpassword'/></p>
                                
                                <input type='submit' value='Register' name='register' />
                                </form>
                                <?php
                                    if(isset($_POST['register'])){
                                        if(empty($username = $_POST['username'])){
                                            echo"Please type a username<br>";
                                        } 
                                        if(empty($password = $_POST['password'])){
                                            echo"Please type a password<br>";
                                        } else{
                                            
                                        
                                        $username = addslashes($_POST['username']);
                                        $password = addslashes($_POST['password']);
                                        $cpassword = addslashes($_POST['cpassword']);
                                        
                                        $checkuser = "SELECT * FROM project02_publicusers where username = '$username'";
                                        $check = $conn->query($checkuser);
                                        if (mysqli_num_rows($check) > 0) {
                                            echo"Name is taken";
                                        } else {
                                            if($password==$cpassword){ 
                                                
                                            
                                            $registeruser = "INSERT INTO `project02_publicusers` (`id`, `username`, `password`) VALUES (NULL, '$username', '$password')";
                                            $adduser = $conn->query($registeruser);
                                            if(isset($_POST['register'])){
                            include("connections/conn.php");
                            $username = addslashes($_POST['username']);
                            $password = addslashes($_POST['password']);
                            $cpassword = addslashes($_POST['cpassword']);
                            
                            
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
        }
                            
                                            if (!$adduser) {
                                                echo $conn->error;
                                            }
                                        } else {
                                            echo"Password does not match";
                                        }}
                                        }}
                                    ?>
                                
                                
                            </div>
        </div>
        
        
        
    <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script> 
    </body>
</html>
