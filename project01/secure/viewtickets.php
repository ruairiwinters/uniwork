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

$readquery = "SELECT * FROM malahide_tickets";

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

                <div class="row">
                    <!-- Content goes in here -->
                    <div class="col m12">
                    <h1>Ticket Details </h1>
                    <a href="index.php"><h6 style="color: #ffffff">Return to Administration Page</h6></a>
                    </div>
                    
                    <?php
                    while ($rowread = $result->fetch_assoc()) {
                            
                            $id = $rowread['ticket_id'];
                            $date = $rowread['ticket_date'];
                            $quantity = $rowread['ticket_no'];
                            $creditcard_no = $rowread['creditcard_no'];
                            $security_no = $rowread['security_no'];
                            $expirymonth = $rowread['expiry_date'];
                            $expiryyear = $rowread['expiry_year'];
                            $title = $rowread['title'];
                            $fname = $rowread['forename'];
                            $sname = $rowread['surname'];
                            $address = $rowread['address'];
                            $postcode = $rowread['postcode'];
                            $contact_no = $rowread['contact_no'];
                            $email = $rowread['email'];
                            $total = $quantity*30;
                        
                        echo
                            "<button class='accordion _yellow _round'>Ticket ID: $id</button>
                              <div class='-panel _cream'>
                                    <h6>Name:           $title $fname $sname
                                    <h6>Ticket Date:    $date
                                    <h6>Quantity:       $quantity
                                    <h6>Total Sale:     £$total 
                                    <h6>Address:        $address
                                    <h6>Postcode:       $postcode
                                    <h6>Email:          $email
                                    <h6>Contact No:     $contact_no
                                    <h6>Credit Card No: $creditcard_no
                                    <h6>Secuirty No:    $security_no
                                    <h6>Expiry Date:    $expirymonth/$expiryyear
                                 
                         </div>";
                       
                        ;}
                        
                    ?>
                
                
                    
                        
                        

                </div>
                <div class="col m1">
                </div>
                
                <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
                <!-- NEEDED FOR ACCORDIAN TRANSITION ^ -->
                
                </body>

                </html>

