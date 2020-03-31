<?php
//code to stop access to secure via URL
    session_start();
    if(!isset($_SESSION["admin_40206636"]))
    {
        header("Location: login.php");
    }
?>
<?php
include("../showerrors.php");
//connect to DB
include("../connect.php");

$readquery = "SELECT * FROM malahide_gallery2018";

$result = $conn->query($readquery);

if (!$result) {
    // the query failed show error to web user
    echo $conn->error;
}
?>

<!DOCTYPE html> 
<html> 
    <head> 
        <title>Administration</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css">
        <link rel="stylesheet" href="../styles/ui.css">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css"/>
    </head>

    <body>
        <div class="row">
            <div class="col m1"></div>
            <div class="col m10 _nightblue">


                <div class="container _nightblue">

                    <div class="col-sm-12 col-md-12  col-lg-12 ">


                        <div class="section">
                            <h1>Choose an Image to Remove</h1>

<?php
while ($rowread = $result->fetch_assoc()) {


    $imageid = $rowread["id"];
    $imagepath = $rowread["imagepath"];
   
    


    echo "<div class='col-m4'>
        <a href='confirmgalleryremove2018.php?editid=$imageid'>
        <img src='../uploaded/$imagepath' width='300' height='200'>
          </a>
        <div/>";
}
?>

                        </div>
                        <a href="index.php"><h6 style="color: #ffffff">Return to Administration Page</h6></a>
                    </div>
                </div>
            </div>
            <div class="col m1"></div>
    </body>

</html>