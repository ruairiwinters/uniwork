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

$lineupid = $_GET['editid'];

$readquery = "SELECT * FROM malahide_lineup WHERE id = '$lineupid'";

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
                            <h2>New Details<h2>


                                    <form enctype='multipart/form-data' action='confirmedit.php' method='POST'>


<?php
while ($rowread = $result->fetch_assoc()) {


    $lineupname = $rowread['name'];
    $lineupdesc = $rowread["description"];
    $lineupid = $rowread["id"];
    $lineupgenre = $rowread["genre"];
    $lineupsong = $rowread["song"];
    $lineupdate = $rowread["date"];
    $lineupimage1 = $rowread["image1"];
    $lineupimage2 = $rowread["image2"];
    $lineupimage3 = $rowread["image3"];


    echo "<h5>Name: <input type='text' name='namedata' value='$lineupname'> </h5>";
    echo "<h5>Description: <input type='text' width='200' height='200' name='descriptiondata' value='$lineupdesc'></textarea></h5>";
    echo "<h5>Genre: <input type='text' name='genredata' value='$lineupgenre'> </h5>";
    echo "<h5>Song: <input type='text' name='songdata' value='$lineupsong'> </h5>";
    echo "<h5>Date: <select type='text' name='datedata' value='$lineupdate'>
                                        <option>2020-06-26</option>
                                        <option>2020-06-27</option>
                                        <option>2020-06-28</option>
                                    </select> </h5>";
    echo "<input type='hidden' name='iddata' value=$lineupid>";
    echo "<h5>Upload the first image: <input name='image1' type='file' value='$lineupimage1' > </h5>";
    echo "<h5>Upload the second image: <input name='image2' type='file' value='$lineupimage2' > </h5>";
    echo "<h5>Upload the third image: <input name='image3' type='file' value='$lineupimage3' > </h5>";
                                
    
}
?>
                                        <input type='submit' value='Update!'>
                                    </form>

                                    </div>
                        <a href="index.php"><h6 style="color: #ffffff">Return to Administration Page</h6></a>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col m1"></div>
                                    </body>

                                    </html>