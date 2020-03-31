
<html>
    <head>
        <title>Malahide Music Festival</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <!-- Links to load UI Framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" type="text/css" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css"/>
        <link rel="stylesheet" href="css/ui.css">
        <link rel="stylesheet" href="css/styles.css">
    <style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("img/music.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
</head>
<body>

    <div class="bg">
        
        <h3 style="text-align:center; "><br> THE COUNTDOWN IS ON... <br></h3>
         <h1 style="text-align:center; font-weight: bold">MALAHIDE MUSIC FESTIVAL<br></h1>
        
        <!-- Display the countdown timer in an element -->
        <h1 style="text-align:center; font-weight: bold; font-family: 'Courier New', Courier, monospace;"  id="demo">
        </h1>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jun 26, 2020 19:30:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>


<div style='align-content: center'>
    <h6 style="text-align:center;">Click below to start the experience...</h6>
    <a href="home.php"><h5 style="text-align:center; color: white "> <img src='img/icon.png' style="height: 75px; width: 75px;"</h5></a>
</div>
</div>

</body>
</html>
