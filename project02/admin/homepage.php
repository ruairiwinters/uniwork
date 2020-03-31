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
            <br>
            <div align="center"><a href='addtext.php'><button class="_xlarge _black">Add Text</button></a></div>
            <br>
            
            
        <?php
        $viewtext = "SELECT * FROM `project02_homepage` ORDER BY position DESC";
        $readtext = $conn->query($viewtext);
        if (!$readtext) {
            echo $conn->error;
        }else{
        
        while ($rowread = $readtext->fetch_assoc()) {
                            
            $id = $rowread['id'];
            $text = $rowread['text'];
            $position = $rowread['position'];

            echo "  <button class='accordion _box _shadow _black'>$position
                        <a href='deletetext.php?textid=$id'>
                            <img src='../img/bin.png' style='width: 5%' align='right'>
                        </a>
                        <a href='edittext.php?textid=$id'>
                            <img src='../img/edit.png' style='width: 5%' align='right'>
                        </a>
                    </button>
                        <div class='-panel'>
                            <p>Text: $text</p>
                        </div>";
                       
        }}
            ?>
        </div><div class='col m1'></div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
