<?php 
  $db = mysqli_connect("localhost","root","","project") or die("Error Connecting");
  $user_name = $_POST["user_name"];
  $no_of_tickets = $_POST["no_of_tickets"];
  $phone_no = $_POST["phone_no"];
  $concertName  = $_POST["concertName"];
  $payment_info  = $_POST["payment_info"];


  $query = <<<EOD
select count(user_name) as cf from user where phone_no = '$phone_no';
EOD;
  $result = mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray4 = mysqli_fetch_all($result,MYSQLI_ASSOC);
if($responseArray4[0]["cf"] == 0)
 { $query = <<<EOD
INSERT INTO `user` (`user_name`, `phone_no`, `no_of_tickets`, `concertName` , `payment_info`) VALUES ('$user_name','$phone_no', '$no_of_tickets', '$concertName' , '$payment_info');
EOD;
   $result= mysqli_query($db,$query) or die(mysqli_error($db));
  $query = <<<EOD
select * from user where phone_no = '$phone_no';
EOD;

  $result= mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
  $user_name = $responseArray[0]["user_name"];

  $query = <<<EOD
select concertId from concert,user where concert.concertName=user.concertName;
EOD;

$result= mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray1 = mysqli_fetch_all($result,MYSQLI_ASSOC);
if($responseArray1[0]["concertId"] != NULL)
 { $concertId = $responseArray1[0]["concertId"];
 
  $query = <<<EOD
update concert set no_of_seats=no_of_seats-$no_of_tickets where concertId = '$concertId';
EOD;
#mysqli_query($db,$query) or die(mysqli_error($db));
# $query = <<<EOD
#update customer set hasStart = 1 where user_name= '$cid';
#EOD;
mysqli_query($db,$query) or die(mysqli_error($db));
$ticket_no = rand(100000 , 999999);
  $query = <<<EOD
INSERT INTO `matchs` (`user_name`, `concertId`, `ticket_no`) VALUES ('$user_name','$concertId','$ticket_no');
EOD;
 if($responseArray4[0]["cf"] == 0)
  { $result= mysqli_query($db, $query) or die(mysqli_error());}

  $query = <<<EOD
select * from concert where concertId = '$concertId';
EOD;
$result1= mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);

    $query = <<<EOD
select * from matchs where user_name = '$user_name';
EOD;
$result1= mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray2 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
}
elseif($responseArray1[0]["concertId"] == NULL)
   {   $query = <<<EOD
      delete from user where phone_no = '$phone_no';
EOD;
  mysqli_query($db,$query) or die(mysqli_error($db));

     header("refresh:3;url=fill.html");
   }
}
elseif($responseArray4[0]["cf"] > 0)
{ header("refresh:0.1;url=bank.html");

}

  @flush();



?>


<!DOCTYPE html>
<html>
<link href="fav.ico" rel="shortcut icon">
<title>Book a concert!</title><head>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bad+Script|Patrick+Hand" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script></head>

<body>
  
  <body id="background">
     <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: black; border-color: black;">
  <div class="container-fluid">
                <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <div>
    <ul class="nav navbar-nav" style="float: right;">
      <li><a href="index.html" >Home</a></li>
      <li><a href="details.html" >Concert Details</a></li>      
      <li><a href="fill.html">Book Now</a></li>
      <li><a href="form.html">Booking Details</a></li>
    </ul></div>
  </div></div>
  
</nav>
    <header class="rent">
<a href="index.html"><img src="logo.png" alt="" class="logo"></a>  
</header>
<br>
<!--<div id = "map">
  <script type="text/javascript">

function initMap() {
  // The location of Uluru
  var geocoder = new google.maps.Geocoder();
  var latitude = "";
  var longitude = "";
  var address = "<?php echo($responseArray[0]["pickLoc"]); ?>";
      geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
          latitude = results[0].geometry.location.lat();
          longitude = results[0].geometry.location.lng();}
        });
  var uluru = {lat: latitude, lng: longitude};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEYSjGkTxEFvRdJDkhoOUBbKC0YfILiRQ&callback=initMap">
    </script>
</div>-->

<header class="heade" align = "center">
  Concert Name : 
  <?php 
  if($responseArray1[0]["concertId"] != NULL) 
    echo($responseArray1[0]["concertName"]); 
else
   {
    echo("All seats are full!");
   }
  ?>
  <br>
  Concert Date: <?php if($responseArray1[0]["c_date"] != NULL) echo($responseArray1[0]["c_date"]); 
  else
   {
    echo("Not Available at the moment");
   }?><br>
  Ticket Number: <?php if($responseArray2[0]["ticket_no"] != NULL) echo($responseArray2[0]["ticket_no"]); 
  else
   {
    echo("Not Available at the moment");
   }?><br>
  Number of tickets: <?php if($responseArray[0]["no_of_tickets"] != NULL) echo($responseArray[0]["no_of_tickets"]); 
  else
   {
    echo("Not Available at the moment");
   }?><br><!--
  OTP : <?php if($responseArray1[0]["id"] != NULL) echo($responseArray2[0]["otp"]); 
  else
   {
    echo("\n");
     echo("Book the tickets again. We regret the inconvenience caused.");
   }?><br>-->
  <br>
</header>
</div>
<div class="bt" align = "center">
  <button class="bt2"><a href="cancel.html">Cancel the booking</a></button>
<button class="bt1"><a href = "end.html">End the session</a></button>
</div>
<br>
<br>
<br>
<style type="text/css">

  .activ{
    font-size: 20px;
    padding-top: 20px;
    }
  .heade{
    font-size: 240%;
    color: black;
    padding: 10px;
    padding-right: 20px;
    font-weight: bold;
    margin-top: 8%;
   font-family: 'Special Elite', cursive;
  }
    a
  {
    color: white;
  }
  a:hover
  {
    color: black;
    font-weight: bold;
    text-decoration: none;
  }

    .rent
  {
    border-color: black;
    margin-top: 4%;
  }
      #map 
  {
    height: 400px;  /* The height is 400 pixels */
    width: 100%;  /* The width is the width of the web page */
  }
    .logo
  {
    width: 15%;
    height: 15%;
  }
  #background
  {
    background-color: #F2EECB;
  }
      .bt
    { color: black;
    }
        .bt1
    {
      color: black;
      background-color: green;
      border-radius: 5px;
      font-size: 150%;
      margin-left: 2%;
    }
            .bt2
    {
      color: black;
      background-color: red;
      border-radius: 5px;
      font-size: 150%;
    }
</style>
    </body></html>
