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

$caption = $_POST['captiondata'];
$sentfilename = $_FILES['image']['name'];
$sentfiletemp = $_FILES['image']['tmp_name'];

if(!empty($sentfilename)){
    move_uploaded_file($sentfiletemp, "../uploaded/$sentfilename");
}else{
    echo "<p>No File Selected</p>";
    die();
}



$updatequery = "INSERT INTO `malahide_gallery2019` (`id`, `imagepath`,`caption`) VALUES (NULL, '$sentfilename', '$caption');";

$result = $conn->query($updatequery);

if (!$result) {
    // the query failed show error to web user
    echo $conn->error;
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css">
        <link rel="stylesheet" href="../styles/ui.css">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css"/>
        <title></title>
    </head>
    <body>
        <div class="row">
            <div class="col m1"></div>
            <div class="col m10 _nightblue">
                <div class="container _nightblue">

                    <div class="col-sm-12 col-md-12  col-lg-12 ">


                        <div class="section">
                            <h1>Image Added</h1>
                            
                            <?php
                            echo "<h4>The image has now been added to the 2019 gallery </h4>"
                                ?>
                                <a href="index.php"><h6 style="color: #ffffff">Return to Administration Page</h6></a>
                                <a href="../gallery2019.php"><h6 style="color: #ffffff">View the new image</h6></a>
                            


                        </div>
                    </div>
                </div>
            </div>
            <div class="col m1"></div>

    </body>
</html>