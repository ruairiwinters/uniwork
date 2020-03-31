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
        
        
        
        <div class='col m3'></div><div class='col m6'>
        
        <form enctype='multipart/form-data' action='' method='POST'>
            <h1 align="center"> Add an act</h1>
            
        <p>Act Name:
       <input type="text" id="name" name="name" value="">
       </p>
       <p>Description:
       <input type="text" id="description" name="description" value="">
       </p>
       <p>Type: 
           <select id="type" name="type"><?php echo $type ?>
               <?php
                while($row1 = $gettype->fetch_assoc()){
                            $typename = $row1['type'];
                            $typeid = $row1['id'];
                        echo "<option value=$typeid>$typename</option>";
                }
               
               
               ?>
           </select>
       </p>
       <p>Add Images: 
           <input type="file" name="upload[]" multiple>
       </p>
       
        <div id='sub'>
            <input name='submit' type='submit' value='Add Act'/>
        </div>
         </form>
            
            <?php 
                if ( isset($_POST['submit'])) { 
                    if(empty($name = $_POST['name'])){
                        echo"Please type in a name<br>";
                    } 
                    if(empty($description = $_POST['description'])){
                        echo"Please type in a description<br>";
                    } else{                    
                    $name = addslashes($_POST['name']);
                    $description = addslashes($_POST['description']);
                    $type = addslashes($_POST['type']);
                    
                    $insertquery = "INSERT INTO `project02_acts` (`id`, `name`, `description`, `typeid`) VALUES (NULL, '$name', '$description', '$type')";
                    $result = $conn->query($insertquery);
                    $last_id = $conn -> insert_id;
                    if (!$result) {
                    echo $conn->error;
                } else {
                    ECHO"Act Added";
                    }}
                
                
                
                
                    
                    
                if (count($_FILES['upload']['name']) > 0) {
                    //Loop through each file
                    for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                        //Get the temp file path
                        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                        //Make sure we have a filepath
                        if ($tmpFilePath != "") {
                            $shortname = $_FILES['upload']['name'][$i];
                            $filePath = "../actimg/" . $_FILES['upload']['name'][$i];

                            $img_read = "SELECT * FROM `project02_actimg` WHERE `filename` = '$shortname'";
                            $result = $conn->query($img_read);
                            if (!$result) {
                                die($conn->error);
                            }
                            $num = $result->num_rows;
                            
                            if ($num > 0) {
                                $newshortname = uniqid('', true) . "$shortname";
                                echo"$shortname is already used, $newshortname will be used instead.<br>";
                                $filePath = "../actimg/$newshortname";
                                move_uploaded_file($tmpFilePath, $filePath);
                                $insertimgquery = "INSERT INTO `project02_actimg` (`id`, `filename`, `actid`) VALUES (NULL, '$newshortname', '$last_id')";
                                $result2 = $conn->query($insertimgquery);
                                if (!$result2) {
                                    echo $conn->error;
                                } else {
                    header("Location: acts.php");
                }
                            } else {
                                echo"UPLOADED $shortname<br>";
                                move_uploaded_file($tmpFilePath, $filePath);
                                $insertimgquery = "INSERT INTO `project02_actimg` (`id`, `filename`, `actid`) VALUES (NULL, '$shortname', '$last_id')";
                                $result2 = $conn->query($insertimgquery);
                                if (!$result2) {
                                    echo $conn->error;
                                } else {
                    header("Location: acts.php");
                }
                            } 
                        }
                    }
                }
                }
                ?>
            
            
            
        
        </div><div class='col m3'></div>
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
