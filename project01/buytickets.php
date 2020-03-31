<?php
include("../showerrors.php");
//connect to DB
include("../connect.php");
?>

<html>
    <head>
        <title>Malahide Music Festival</title>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- Links to load UI Framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <link rel="stylesheet" href="css/ui.css">
        <link rel="stylesheet" href="css/styles.css">




        <!-- Form Validation -->
        <script>
            jQuery(document).ready(function () {
                console.log("jquery engine loaded");

                jQuery('form').submit(function (e) {
                    var inp = $("#date").val();
                    inp = jQuery.trim(inp);
                    var inp2 = $("#quantity").val();
                    inp2 = jQuery.trim(inp2);
                    var inp3 = $("#title").val();
                    inp3 = jQuery.trim(inp3);
                    var inp4 = $("#fname").val();
                    inp4 = jQuery.trim(inp4);
                    var inp5 = $("#sname").val();
                    inp5 = jQuery.trim(inp5);
                    var inp6 = $("#address").val();
                    inp6 = jQuery.trim(inp6);
                    var inp7 = $("#postcode").val();
                    inp7 = jQuery.trim(inp7);
                    var inp8 = $("#number").val();
                    inp8 = jQuery.trim(inp8);
                    var inp9 = $("#ccnumber").val();
                    inp9 = jQuery.trim(inp9);
                    var inp10 = $("#security").val();
                    inp10 = jQuery.trim(inp10);
                    var inp11 = $("#expirydate").val();
                    inp11 = jQuery.trim(inp11);
                    var inp12 = $("#email").val();
                    inp12 = jQuery.trim(inp12);

                    if (inp.length <= 5) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb1").text('Please select a date.');
                    }

                    if (inp2 <= 0) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb2").text('Please select how many tickets you would like.');
                    }

                    if (inp3.length > 4) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb3").text('Please select a title.');
                    }

                    if (inp4.length <= 0) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb4").text('Please type your forename.');
                    }

                    if (inp5.length <= 0) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb5").text('Please type your surname.');
                    }

                    if (inp6.length <= 0) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb6").text('Please type your address.');
                    }

                    if (inp7.length <= 0) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb7").text('Please type your postcode.');
                    }
                    
                    if (inp7.length > 7) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb7").text('Please enter a valid postcode of 7 characters.');
                    }

                    if (inp8.length <= 0) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb8").text('Please type your contact number.');
                    }
                    
                    if (inp9.length <= 0){
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb9").text('Please type your credit card number.');
                    }
                    
                    if (inp9.length>16) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb9").text('Please enter a valid credit card number of 16 characters.');
                    }
                    
                    if ((inp10.length>3) || (inp10.length<=0)) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb10").text('Please type your security number.');
                    }
                    
                    if (inp11.length>4) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb11").text('Please select your expiry date.');
                      }
                    
                    if (inp12.length <= 0) {
                        e.preventDefault(); //prevent default form submit
                        jQuery("#fb12").text('Please type in your email address.');
                    }
                    
                    
                    
                    var inputQuantity = [];
    $(function() {
      $(".quantity").each(function(i) {
        inputQuantity[i]=this.defaultValue;
         $(this).data("idx",i); // save this field's index to access later
      });
      $(".quantity").on("keyup", function (e) {
        var $field = $(this),
            val=this.value,
            $thisIndex=parseInt($field.data("idx"),10); // retrieve the index
//        window.console && console.log($field.is(":invalid"));
          //  $field.is(":invalid") is for Safari, it must be the last to not error in IE8
        if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid") ) {
            this.value = inputQuantity[$thisIndex];
            return;
        } 
        if (val.length > Number($field.attr("maxlength"))) {
          val=val.slice(0, 5);
          $field.val(val);
        }
        inputQuantity[$thisIndex]=val;
      });      
    });

                    
                    
                    
                    
                });
            });
        </script>


    </head>
    <body>
        <div class="row">
            <div class="col m1"></div>
            <div class="col m10 ">
                <ul class="topnav _f-yellow _nightblue" id="myTopnav2">
                    <li><a href="home.php" class="brand _f-yellow">Home</a></li>
                        <li><a href="lineup.php" class="active">Lineup</a></li>
                        <li><a href="venue.php" class="active">Venue</a></li>
                        <li><a href="buytickets.php" class="active">Tickets</a></li>
                        <li class="dropdown"><a href="#" class ="active">Gallery</a><div class="dropdown-content">
                            <a href="gallery2018.php" class ="active">2018 Photos</a>
                            <a href="gallery2019.php" class ="active">2019 Photos</a></div></li>
                        <li><a href="secure/login.php" class ="active">Login</a></li>   
                        <li class="-icon">
                   <a href="javascript:void(0);" onclick="topnav('myTopnav2')">Menu</a>
                </li>

            </ul>
                <img src="img/festival1.1.jpeg" style='width: 100%' >
                <div class="_nightblue">
                    <!-- Content goes in here TICKETS-->
                <h1 class='pageheader'>Buying Tickets </h1>
                    
                    
                <form action="confirmtickets.php" method="POST">
                        <div class="row">
                            <div class="col m6">
                                <h3 id="ticketheading" class='ticketheader'> Ticket Information</h3>
                                <div>
                                    <label>Price of Ticket: £30</label>
                                </div>
                                
                                
                                <div>
                                    <label for="date" >Date of Ticket</label>
                                    <select class="u-full-width" id="date" name="date"style="margin:0px">
                                        <option value="empty">Select a date</option>
                                        <option value="2020-06-26">Friday</option>
                                        <option value="2020-06-27">Saturday</option>
                                        <option value="2020-06-28">Sunday</option>
                                    </select>
                                    <div id="fb1"></div>
                                </div>
                                
                                <div>
                                    <label for="quantity" >Number of Tickets</label>
                                    <input class="u-full-width" type="number" id="quantity" name="quantity" style="margin:0px">
                                    <div id="fb2"></div>
                                </div>
                                
                                <h1><br> </h1>
                                
                                <h3 id="ticketheading" class='ticketheader'> Payment Details</h3>
                                <div>
                                    <label for="ccnumber" >Credit Card Number</label>
                                    <input class="quantity, u-full-width" type="number"  id="ccnumber" name="ccnumber" style="margin:0px"min="100000000000000" max="9999999999999999" maxlength="16"">
                                    
                                    <div id="fb9"></div>
                                </div>
                                <div>
                                    <label for="security" >Security Code (3 Digits at back)</label>
                                    <input class="quantity, u-full-width" type="number"  id="security" name="security" style="margin:0px"min="100" max="999" maxlength="3">
                                    <div id="fb10"></div>
                                </div>
                                <div>
                                    <label for="expirydate" >Expiry Date</label>
                                    <select class="u-full-width" id="expirymonth" name="expirymonth" style="margin:0px">
                                        <option value="empty">Select a month</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <select class="u-full-width" id="expiryyear" name="expiryyear" style="margin:0px">
                                        <option value="empty">Select a year</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                    </select>
                                    <div id="fb11"></div>
                                </div>
                            </div>
                        

                            <div class="col m6">
                                <h3 id="customerheading" class='ticketheader'> Customer Information</h3>
                                <div>
                                    <label for="title" >Title</label>
                                    <select class="u-full-width" id="title" name="title"style="margin:0px">
                                        <option value="emptytitle">Select a title</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                    </select>
                                    <div id="fb3"></div>
                                </div>
                                <div>
                                    <label for="fname">Forename</label>
                                    <input class="u-full-width" type="text" id="fname" name="fname"style="margin:0px">
                                    <div id="fb4"></div>
                                </div>
                                <div>
                                    <label for="sname" >Surname</label>
                                    <input class="u-full-width" type="text" id="sname" name="sname" style="margin:0px">
                                    <div id="fb5"></div>
                                </div>
                                <div>
                                    <label for="address" >Address</label>
                                    <textarea rows="3" cols="25" id="address" name="address" style="margin:0px">
                                    </textarea>
                                    <div id="fb6"></div>
                                </div>
                                <div>
                                    <label for="postcode" >Postcode</label>
                                    <input class="u-full-width" type="text" id="postcode" name="postcode" style="margin:0px" maxlength="7">
                                    <div id="fb7"></div>
                                </div>
                                <div>
                                    <label for="number" >Contact Number</label>
                                    <input class="u-full-width" type="text" id="number" name="number" style="margin:0px" maxlength="11">
                                    <div id="fb8"></div>
                                </div>
                                <div>
                                    <label for="email">Email</label>
                                    <input class="u-full-width" type="text" id="email" name="email" style="margin:0px">
                                    <div id="fb12"></div>
                                </div>
                            </div>
                        </div>


                        <input class="button-primary mysubmit" type="submit" value="Submit" style="background-color: #FBC73D"/>
                    </form>


<div class="row" style="background: linear-gradient(to bottom, #2d3e50 0%, #808080 100%);">
                    <br>
                </div>
                <div class="row" style="background-color: gray">
                    <p align="right" style="padding-right: 20px; padding-top: 15px; padding-bottom: 0px; color: white;"> (028) 8363-4324 <br>
                        2, The Green, Strand St, Malahide, 
                        <br>Co. Dublin, Ireland
                    <div style="padding-right: 15px;">
                    <a href="https://www.twitter.com"><img src="img/twitter.png" align="right" style="height: 40px; width: 40px;"> </a>
                    <a href="https://www.facebook.com"><img src="img/facebook.png" align="right" style="height: 40px; width: 40px;"> </a>
                    <a href="https://www.instagram.com"><img src="img/insta.png" align="right" style="height: 40px; width: 40px;"> </a>
                    </div>
                    </p>
                    
                    
                </div>


                </div>
                <div class="col m1"></div>
            </div>
            <script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
        </div>
    </body>
</html>