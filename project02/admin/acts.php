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
            <div align="center"><a href='addact.php'><button class="_xlarge _black">Create an Act</button></a></div>
            <br>
            
            
        <?php
        $viewusers = "SELECT * FROM `project02_acts` ORDER BY name DESC";
        $readusers = $conn->query($viewusers);
        if (!$readusers) {
            echo $conn->error;
        }else{
        
        while ($rowread = $readusers->fetch_assoc()) {
                            
            $id = $rowread['id'];
            $name = $rowread['name'];
            $description = $rowread['description'];
            $type = $rowread['typeid'];

            echo "  <button class='accordion _box _shadow _black'>$name
                        <a href='deleteact.php?actid=$id'>
                            <img src='../img/bin.png' style='width: 5%' align='right'>
                        </a>
                        <a href='editact.php?actid=$id'>
                            <img src='../img/edit.png' style='width: 5%' align='right'>
                        </a>
                    </button>
                        <div class='-panel'>
                            <p>Description: $description</p>";
        

        $viewtype = "SELECT project02_type.type FROM project02_type WHERE project02_type.id = $type";
        $readtype = $conn->query($viewtype);
        if (!$readtype) {
            echo $conn->error;
        }else{
        
        while ($rowread = $readtype->fetch_assoc()) {
            $typename = $rowread['type'];
        
                        echo"<p>Type: $typename </p>
                        </div>";
                       
        }}}}
            ?>
        </div><div class='col m1'></div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
            
            
            
    </body>
</html>
