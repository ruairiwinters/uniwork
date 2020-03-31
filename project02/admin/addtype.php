<?php
 session_start();
if (isset($_SESSION["userid_admin_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_admin_40206636'];
    
    
    
    include('../connections/conn.php');
    
    $typeread = "SELECT * FROM project02_type";
    $gettype = $conn->query($typeread);
    if(!$gettype){	
	echo $conn -> error;
    }
    
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
        
        <h1 align='center'>Add a Type</h1> <br>"
        
        <div class='col m3'></div><div class='col m6'>
        
        <form enctype='multipart/form-data' action='' method='POST'>

       <p>Typename:
        <input type="text" id="name" name="name" value="">
       </p>
       <p>Upload Cover Image: 
           <input type="file" name="upload[]" id="upload">
       </p>
      
       <div id='sub'>
            <input name='submit' type='submit' value='Add Type'/>
        </div>
        </form><br><br><br><br>
          
            
            
            
            <?php 
                if ( isset($_POST['submit'])) {
                    if(empty($newtypename = $_POST['name'])){
                        echo"Please type in a name<br>";
                    } else{ 
                    
                    $newtypename = addslashes($_POST['name']);
                    
                    if (count($_FILES['upload']['name']) > 0) {
                    //Loop through each file
                    for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                        //Get the temp file path
                        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                        //Make sure we have a filepath
                        if ($tmpFilePath != "") {
                            $shortname = $_FILES['upload']['name'][$i];
                            $filePath = "../typeimg/" . $_FILES['upload']['name'][$i];

                            $img_read = "SELECT * FROM `project02_type` WHERE `imagepath` = '$shortname'";
                            $result = $conn->query($img_read);
                            if (!$result) {
                                die($conn->error);
                            }
                            $num = $result->num_rows;
                            
                            if ($num > 0) {
                                $newshortname = uniqid('', true) . "$shortname";
                                echo"$shortname is already used, $newshortname will be used instead.<br>";
                                $filePath = "../typeimg/$newshortname";
                                move_uploaded_file($tmpFilePath, $filePath);
                                $updateimgquery = "INSERT INTO `project02_type` (`id`, `type`, `imagepath`) VALUES (NULL, '$newtypename', '$newshortname');";
                                $result2 = $conn->query($updateimgquery);
                                if (!$result2) {
                                    echo $conn->error;
                                } else {
                    header("Location: type.php");
                }
                            } else {
                                echo"UPLOADED $shortname<br>";
                                move_uploaded_file($tmpFilePath, $filePath);
                                $updateimgquery = "INSERT INTO `project02_type` (`id`, `type`, `imagepath`) VALUES (NULL, '$newtypename', '$shortname');";
                                $result2 = $conn->query($updateimgquery);
                                if (!$result2) {
                                    echo $conn->error;
                                } else {
                    header("Location: type.php");
                }
                            } 
                        }
                    }
                }
                }}
                    ?>
        
        </div><div class='col m3'></div>
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
