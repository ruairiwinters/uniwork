<?php
 session_start();
if (isset($_SESSION["userid_event_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_event_40206636'];
    
    
    include('../connections/conn.php');
    $id = $_GET['fileid'];
    $eventid = $_GET['eventid'];
    $removeimglinks = "DELETE FROM `project02_downloadable` WHERE `id` = $id";
    $removeimg = $conn->query($removeimglinks);
    if (!$removeimg) {
            echo $conn->error;
        }else{
    
    header("Location: download.php?eventid=$eventid");   
    
    
    
}}
 else {
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
                <li><a href="index.php" class="brand">Event Management Page</a></li>
                <li> <a href='../viewaccount.php'>View Account</a> </li>  
                <li class="-icon">
                   <a href="javascript:void(0);" onclick="topnav('myTopnav2')">Menu</a>
                </li>
            </ul>
             
        </nav>    
        
        <!---Header--->    
        
            
       <?PHP
        

        echo"<h1 align='center'>Add/Edit Images</h1> <br>";
        ?>
        
        <div class='col m3'></div><div class='col m6'>
        
        <form enctype='multipart/form-data' action='' method='POST'>

       <p>Add Images: 
           <input type="file" name="upload[]" multiple>
       </p>
       <p>Position: 
           <select id="position" name="position"><?php echo $position ?>
               <option value='Top'>Top</option>
               <option value='Middle'>Middle</option>
               <option value='Bottom'>Bottom</option>
           </select>
       </p><div id='sub'>
            <input name='submit' type='submit' value='Add Image'/>
        </div>
        </form><br><br><br><br>
          
            
            
            
            <?php 
                if ( isset($_POST['submit'])) {
                    $position = $_POST['position'];
                    
                    if (count($_FILES['upload']['name']) > 0) {
                    //Loop through each file
                    for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                        //Get the temp file path
                        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                        //Make sure we have a filepath
                        if ($tmpFilePath != "") {
                            $shortname = $_FILES['upload']['name'][$i];
                            $filePath = "../eventimg/" . $_FILES['upload']['name'][$i];

                            $img_read = "SELECT * FROM `project02_eventimg` WHERE `filepath` = '$shortname'";
                            $result = $conn->query($img_read);
                            if (!$result) {
                                die($conn->error);
                            }
                            $num = $result->num_rows;
                            
                            if ($num > 0) {
                                $newshortname = uniqid('', true) . "$shortname";
                                echo"$shortname is already used, $newshortname will be used instead.<br>";
                                $filePath = "../eventimg/$newshortname";
                                move_uploaded_file($tmpFilePath, $filePath);
                                $insertimgquery = "INSERT INTO `project02_eventimg` (`id`, `filepath`, `position`, `eventid`) VALUES (NULL, '$newshortname', '$position', '$eventid')";
                                $result2 = $conn->query($insertimgquery);
                                if (!$result2) {
                                    echo $conn->error;
                                } else {
                    header("Location: addimg.php?eventid=$eventid");
                }
                            } else {
                                echo"UPLOADED $shortname<br>";
                                move_uploaded_file($tmpFilePath, $filePath);
                                $insertimgquery = "INSERT INTO `project02_eventimg` (`id`, `filepath`, `position`, `eventid`) VALUES (NULL, '$shortname', '$position', '$eventid')";
                                $result2 = $conn->query($insertimgquery);
                                if (!$result2) {
                                    echo $conn->error;
                                } else {
                    header("Location: addimg.php?eventid=$eventid");
                }
                            } 
                        }
                    }
                }
                }
                
                
                
                
                echo "<br><br><br>";
            $checkuserimg = "SELECT * FROM `project02_eventimg` WHERE `eventid` = $eventid";
            $result = $conn->query($checkuserimg);
                            if(!$result){
                                die($conn->error);
                            }
            
                                echo"<div class='container'>"; 	
                                   
                                        $getimg = "SELECT * FROM `project02_eventimg` WHERE `eventid` = $eventid";
                                        $viewimg = $conn->query($getimg);
                                            if(!$viewimg){
                                                die($conn->error);
                                            }
                                            while ($row = $viewimg->fetch_assoc()) {
                                                $imgid = $row["id"];
                                                $filename = $row["filepath"];
                                                $position = $row["position"];
                                                    echo "<div class='box'>
                                                            <img src='../eventimg/$filename'>
                                                            <br><p align='center'>$position</p><br>
                                                            <a href='deleteimg.php?imageid=$imgid'><center><img src='../img/bin.png' style='width: 60%;'></center></a>
                                                        </div>";
                                            }echo"</div>";
                            
                            
                ?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
