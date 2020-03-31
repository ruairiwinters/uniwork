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

$newtitle = $_POST['namedata'];
$newdesc = $_POST['descriptiondata'];
$newgenre = $_POST['genredata'];
$newsong = $_POST['songdata'];
$newdate = $_POST['datedata'];

$sentfilename1 = $_FILES['image1']['name'];
$sentfiletemp1 = $_FILES['image1']['tmp_name'];

if(!empty($sentfilename1)){
    move_uploaded_file($sentfiletemp1, "../uploaded/$sentfilename1");
}else{
    echo "<p>No File Selected</p>";
    die();
}

$sentfilename2 = $_FILES['image2']['name'];
$sentfiletemp2 = $_FILES['image2']['tmp_name'];

if(!empty($sentfilename2)){
    move_uploaded_file($sentfiletemp2, "../uploaded/$sentfilename2");
}else{
    echo "<p>No File Selected</p>";
    die();
}

$sentfilename3 = $_FILES['image3']['name'];
$sentfiletemp3 = $_FILES['image3']['tmp_name'];

if(!empty($sentfilename3)){
    move_uploaded_file($sentfiletemp3, "../uploaded/$sentfilename3");
}else{
    echo "<p>No File Selected</p>";
    die();
}

$updatequery = "INSERT INTO `malahide_lineup` (`id`, `name`, `description`, `genre`, `song`, `date`, `image1`, `image2`, `image3`) VALUES (NULL, '$newtitle', '$newdesc', '$newgenre', '$newsong', '$newdate', '$sentfilename1', '$sentfilename2', '$sentfilename3');";

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
                            <h1>Act Added</h1>
                            
                            <?php
                            echo "<h4>The act $newtitle is now added to the lineup for $newdate </h4>"
                                ?>
                                <a href="index.php"><h6 style="color: #ffffff">Return to Administration Page</h6></a>
                                <a href="../lineup.php"><h6 style="color: #ffffff">View the new updated act</h6></a>
                            


                        </div>
                    </div>
                </div>
            </div>
            <div class="col m1"></div>

    </body>
</html>
