<?php
 session_start();
if (isset($_SESSION["userid_admin_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_admin_40206636'];
    
    
    
    include('../connections/conn.php');
    $id = $_GET['actid'];
    $viewact = "SELECT * FROM `project02_acts` WHERE id = $id";
        $readact = $conn->query($viewact);
        if (!$readact) {
            echo $conn->error;
        }
        
        
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
        
        <?PHP
        while ($rowread = $readact->fetch_assoc()) {
                            
            $actid = $rowread['id'];
            $name = $rowread['name'];
            $description = $rowread['description'];
            $type = $rowread['typeid'];

        echo"<h1 align='center'>$name</h1> <br>";}
        ?>
        
        <div class='col m3'></div><div class='col m6'>
        
        <form enctype='multipart/form-data' action='' method='POST'>


        <p>Act Name:
       <input type="text" id="name" name="name" value="<?php echo $name ?>">
       </p>
       <p>Description:
       <input type="text" id="description" name="description" value="<?php echo $description ?>">
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
            <input name='submit' type='submit' value='Update Act'/>
        </div>
         </form>
            
            <?php 
                if ( isset($_POST['submit'])) { 
                    
                    if(empty($name = $_POST['name'])){
                        echo"Please type in a name<br>";
                    } 
                    if(empty($description = $_POST['description'])){
                        echo"Please type in a description<br>";
                    }
                    if(empty($type = $_POST['type'])){
                        echo"Please type in a type<br>";
                    } else {
                    
                    $name = addslashes($_POST['name']);
                    $description = addslashes($_POST['description']);
                    $type = addslashes($_POST['type']);
                    
                    $updatequery = ("UPDATE `project02_acts` SET `name`= '$name',`description`='$description', `typeid`= '$type' WHERE id = $id");
                    $result = $conn->query($updatequery);
                    if (!$result) {
                    echo $conn->error;
                } else {
                    header("Location: acts.php");
                    }
                
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
                                $insertimgquery = "INSERT INTO `project02_actimg` (`id`, `filename`, `actid`) VALUES (NULL, '$newshortname', '$actid')";
                                $result2 = $conn->query($insertimgquery);
                                if (!$result2) {
                                    echo $conn->error;
                                } else {
                    header("Location: acts.php");
                }
                            } else {
                                echo"UPLOADED $shortname<br>";
                                move_uploaded_file($tmpFilePath, $filePath);
                                $insertimgquery = "INSERT INTO `project02_actimg` (`id`, `filename`, `actid`) VALUES (NULL, '$shortname', '$actid')";
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
                                }}
                                
            echo "<br><br><br>";
            $checkuserimg = "SELECT * FROM `project02_actimg` WHERE `actid` = $id";
            $result = $conn->query($checkuserimg);
                            if(!$result){
                                die($conn->error);
                            }
                            $num = $result->num_rows;
                            if ($num == 1){
                                echo"<h3 align='center'> $name's Image</h3>
            
                                <div class='container'>"; 	
                                   
                                        $getimg = "SELECT * FROM `project02_actimg` WHERE `actid` = $id";
                                        $viewimg = $conn->query($getimg);
                                            if(!$viewimg){
                                                die($conn->error);
                                            }
                                            while ($row = $viewimg->fetch_assoc()) {
                                                $imgid = $row["id"];
                                                $filename = $row["filename"];
                                                    echo "<div class='box'>
                                                            <img src='../actimg/$filename'>
                                                        </div>";
                                            }echo"</div>";
                            } 
                            else if ($num > 1){
                                echo"<h3 align='center'> $name's Images</h3>
            
                                <div class='container'>"; 	
                                   
                                        $getimg = "SELECT * FROM `project02_actimg` WHERE `actid` = $id";
                                        $viewimg = $conn->query($getimg);
                                            if(!$viewimg){
                                                die($conn->error);
                                            }
                                            while ($row = $viewimg->fetch_assoc()) {
                                                $imgid = $row["id"];
                                                $filename = $row["filename"];
                                                    echo "<div class='box'>
                                                            <img src='../actimg/$filename'>
                                                                <a href='deleteimg.php?imageid=$imgid'><center><img src='../img/bin.png' style='width: 60%;'></center></a>
                                                        </div>";
                                            }echo"</div>";
                            }
            
            
            
            ?>
        </div><div class='col m3'></div>";
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>    
    </body>
</html>
