<?php 

  $db = mysqli_connect("localhost","root","","project") or die("Error Connecting");

  $ticket_no = $_GET["ticket_no"];

  $query = <<<EOD
select * from matchs where ticket_no = '$ticket_no';
EOD;
  $result = mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
  $concertId = $responseArray[0]["concertId"];
 if($responseArray[0]["concertId"] != NULL) 
{
    $query = <<<EOD
select * from  concert where concertId = '$concertId';
EOD;
  
  $result = mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray1 = mysqli_fetch_all($result,MYSQLI_ASSOC); 
  $BandId = $responseArray[0]["BandId"];
 $query = <<<EOD
select * from  Band where BandId = '$BandId';
EOD;
  $result = mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray2 = mysqli_fetch_all($result,MYSQLI_ASSOC);
}
elseif($responseArray[0]["concertId"] == NULL)
{
  header("refresh:0.1;url=nobook.html");
}
  @flush();
?>
<!DOCTYPE html>
<html>
<head>
  <link href="fav.ico" rel="shortcut icon">
  <title>Concert Booking</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="robots" content="noindex, nofollow" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:500|Bangers|Monoton" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pompiere" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Handlee|Quando" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <meta name="captcha-bypass" id="captcha-bypass" />
</head>
<body>

  <body id = "background">
    <div class="loader"></div>
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
      <li><a href="form.html">Concert Details</a></li>
      <!--<li><a href="members.html" >Members</a></li>      
      <li><a href="register.html">Driver Registration</a></li>
      <li><a href="Terms and Conditions.pdf" target="_blank">Terms And Conditions</a></li>-->
    </ul></div>
  </div></div>
  
</nav>
<header class="rent">
<img src="Logo.png" alt="" class="logo">  
</header>
<header class="heade" align = "center">
  Concert Name : <?php echo($responseArray1[0]["concertName"]); ?> <br>

  Concert Date : <?php echo($responseArray1[0]["c_date"]);?><br>

  Band : <?php echo($responseArray2[0]["BandName"]); ?><br>
  
  Ticket Number : <?php echo($responseArray[0]["ticket_no"]);?><br>

  <!--OTP : <?php echo($responseArray1[0]["otp"]);?><br>-->
  <br>
</header>
<div class="bt" align = "center">
<button class="bt1"><a href = "r.php">Cancel the booking</a></button>
</div>
<style type="text/css">
  .d1
  { background-color: black;
  color: white;
  font-size: 150%;
  font-family: 'Source Sans Pro', sans-serif; }  
  .d2
  { 
  font-size: 150%;
  font-family: 'Source Sans Pro', sans-serif; }
  #background
  {
    background-repeat: none;
    min-width: 100%;
    background-color: #F2EECB;
    background-size: cover;
    width: 20%;
    height: 100%;
  }
      .bt
    { color: black;
      
      margin-top: 3%;
    }
        .bt1
    {
      color: black;
      background-color: red;
      border-radius: 5px;
      font-size: 150%;
    }
        #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
  .head
  { padding-top: 15%;
    padding-left: 10%;
    width: 100%;
    float: left; }
    .head1
  { padding-left: 10%;
    width: 100%;
    float: right; 
  }
    .head2
  { 
    font-size: 300%;
    color: white;
    font-weight: bold;
  }
  .head3
  {
    font-size: 250%;
    color: white;
    
  }

  .rent
  {
    padding-top: 3%;
    border-color: black;

  }
  .logo
  {
    width: 15%;
    height: 15%;
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
    .heade{
    font-size: 240%;
    color: black;
    padding: 10px;
    padding-right: 20px;
    font-weight: bold;
    margin-top: 8%;
   font-family: 'Special Elite', cursive;
  }
</style>

</body>
</html>