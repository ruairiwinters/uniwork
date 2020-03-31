<?php
 session_start();
if (isset($_SESSION["userid_event_40206636"])) {
    $userisset = 'logged in';
    $userid  = $_SESSION['userid_event_40206636'];
    
    
    include('../connections/conn.php');
    $eventid = $_GET['eventid'];
    
    
    
    
    
    
    
}
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
        
            
       <h1 align='center'>Add Downloadable Content</h1> <br>
       
        
        <div class='col m3'><?php echo"<a href='myevents.php?userid=$userid'><img src='../img/back.png' width=40%></a>";?></div><div class='col m6'>
        
        <form enctype='multipart/form-data' action='' method='POST'>
       <p>Filename:
       <input type="text" id="filename1" name="filename1" value="">
       </p>     
       <p>Upload File: 
           <input type="file" name="upload[]" id="upload">
       </p>
       <p>Accessible By: 
           <select id="accessible" name="accessible">
               <option value='everyone'>Everyone</option>
               <option value='reservers'>Ticket Reservers</option>
           </select>
       </p><div id='sub'>
            <input name='submit' type='submit' value='Add File'/>
        </div>
        </form><br><br><br><br>
          
            
            
            
            <?php 
                if ( isset($_POST['submit'])) { 
                    
                    $accessible = $_POST['accessible'];
                    $filename1 = $_POST['filename1'];
                    
                    if (count($_FILES['upload']['name']) > 0) {
                    //Loop through each file
                    for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                        //Get the temp file path
                        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                        //Make sure we have a filepath
                        if ($tmpFilePath != "") {
                            $shortname = $_FILES['upload']['name'][$i];
                            $filePath = "../downloadable/" . $_FILES['upload']['name'][$i];

                            $img_read = "SELECT * FROM `project02_downloadable` WHERE `filepath` = '$shortname'";
                            $result = $conn->query($img_read);
                            if (!$result) {
                                die($conn->error);
                            }
                            $num = $result->num_rows;
                            
                            if ($num > 0) {
                                $newshortname = uniqid('', true) . "$shortname";
                                echo"$shortname is already used, $newshortname will be used instead.<br>";
                                $filePath = "../downloadable/$newshortname";
                                move_uploaded_file($tmpFilePath, $filePath);
                                $updateimgquery = "INSERT INTO `project02_downloadable` (`id`, `filepath`, `eventid`, `access`, `name`) VALUES (NULL, '$newshortname', '$eventid', '$accessible', '$filename1');";
                                $result2 = $conn->query($updateimgquery);
                                if (!$result2) {
                                    echo $conn->error;
                                } else {
                    header("Location: myevents.php?userid=$userid");
                }
                            } else {
                                echo"UPLOADED $shortname<br>";
                                move_uploaded_file($tmpFilePath, $filePath);
                                $updateimgquery = "INSERT INTO `project02_downloadable` (`id`, `filepath`, `eventid`, `access`, `name`) VALUES (NULL, '$shortname', '$eventid', '$accessible', '$filename1');";
                                $result2 = $conn->query($updateimgquery);
                                if (!$result2) {
                                    echo $conn->error;
                                } else {
                    header("Location: download.php?eventid=$eventid");
                }
                            } 
                        }
                    }
                }
                        }
                    ?>
        
        <?php
        echo "<br><br><br>";
            $checkuserimg = "SELECT * FROM `project02_downloadable` WHERE `eventid` = $eventid";
            $result = $conn->query($checkuserimg);
                            if(!$result){
                                die($conn->error);
                            }
            
                                echo"<div class='container'>"; 	
                                   
                                        $getimg = "SELECT * FROM `project02_downloadable` WHERE `eventid` = $eventid";
                                        $viewimg = $conn->query($getimg);
                                            if(!$viewimg){
                                                die($conn->error);
                                            }
                                            while ($row = $viewimg->fetch_assoc()) {
                                                $fileid = $row["id"];
                                                $filename = $row["name"];
                                                $access = $row["access"];
                                                    echo "<div class='box'>
                                                            <br><p align='center'>$filename</p>
                                                                <p align='center'>$access</p><br>
                                                            <a href='deletedownload.php?fileid=$fileid&&eventid=$eventid'><center><img src='../img/bin.png' style='width: 60%;'></center></a>
                                                        </div>";
                                            }echo"</div>";
                            
                            
                ?>
        
        
        
        
        </div><div class='col m3'></div>
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
