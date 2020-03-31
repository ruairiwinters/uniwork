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
                        } 
                    ?>
                    
                </ul>
            </div>
        </nav>
        
        <div class='col m3'></div>
        <div class='col m6'>
        <h1 align='center'> View Account </h1>
        
        <?php
        $checkusertype = "SELECT usertype FROM `project02_publicusers` WHERE id = '$userid' AND usertype = '1'";
                                        $checktype = $conn->query($checkusertype);
                                        if (mysqli_num_rows($checktype) > 0) {
                                            $_SESSION["userid_40206636"] = $userid;
                                            echo"<div class='jumbo _dark'>
                                                    <a href='reservations.php'><button class='_xlarge _white'>Event Reservations</button></a>
                                                    <h5> View and Delete Ticket Reservations </h5>
                                                </div>
                                                <br>";
                                            echo"<div class='jumbo _dark'>
                                                    <a href='myreviews.php'><button class='_xlarge _white'>My Reviews</button></a>
                                                    <h5> View and Delete Reviews of Events </h5>
                                                </div>
                                                <br>";
                                            echo"<div class='jumbo _dark'>
                                                    <a href='mymessages.php'><button class='_xlarge _white'>Messages</button></a>
                                                    <h5> View and Delete Messages </h5>
                                                </div>
                                                <br>";
                                        }
        
        ?>
        <?php
        $checkusertype = "SELECT usertype FROM `project02_publicusers` WHERE id = '$userid' AND usertype = '3'";
                                        $checktype = $conn->query($checkusertype);
                                        if (mysqli_num_rows($checktype) > 0) {
                                            $_SESSION["userid_admin_40206636"] = $userid;
                                            echo"<div class='jumbo _dark'>
                                                    <a href='admin/index.php'><button class='_xlarge _white'>Administration</button></a>
                                                </div>
                                                <br>";
                                        }
        
        ?>
        <?php
        $checkusertype = "SELECT usertype FROM `project02_publicusers` WHERE id = '$userid' AND usertype = '2'";
                                        $checktype = $conn->query($checkusertype);
                                        if (mysqli_num_rows($checktype) > 0) {
                                            $_SESSION["userid_event_40206636"] = $userid;
                                            echo"<div class='jumbo _dark'>
                                                    <a href='eventmanager/index.php?userid=$userid'><button class='_xlarge _white'>Event Management</button></a>
                                                    <h5>Manage your events</h5>
                                                </div>
                                                <br>";
                                        }
        
        ?>
        <!--CHANGE PASSWORD-->
        <?php
        $getpword = "SELECT * FROM project02_publicusers WHERE id= $userid";
        $checkpword = $conn->query($getpword);
        while($row1 = $checkpword->fetch_assoc()){
        $password = $row1['password'];}?>
        
        
        
        <button class='accordion _box _shadow _dark'>Change Password</button>
                    <div class='-panel'>
                        <form method='POST' action=''>
                    <div class='col m6'>
                        <p>Old Password: <?php echo"$password"?></p>
                    </div>
                    <div class='col m6'>
                        <p>New Password:</p><input type='text' value='' name='new'/>
                        <input type='submit' value='Change' name='Change'/>
                    </div>
                        </form>
                    </div>
        
        <?php 
                        if(isset($_POST['Change'])){
                            $pword = addslashes($_POST['new']);
                            $changepword="UPDATE `project02_publicusers` SET `password`= '$pword' WHERE `id` = '$userid'";
                            $password = $conn->query($changepword);
                    if (!$password) {
                    echo $conn->error;
                } else {
                    header("Location: viewaccount.php");
                }
                        }
        ?>
        
        
        
         <!--LOGOUT-->
        <form method='POST' action='viewaccount.php'>
            <input type='submit' value='Logout' name='logout' style="background-color: #888" />
        </form>
            <?php 
                        if(isset($_POST['logout'])){
                        session_destroy();
                        header("Location: index.php");
                        }
                        ?>
        
                
                
                
            </div>
        <div class='col m3'></div>
    <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
