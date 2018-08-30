<html>
<head>
</head>

<script type="text/javascript" src="validate.js"></script>
<style>
body, html {
    height: 100%;
    margin: 0;
}

.bg {
    /* The image used */
    background-image: url("4.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.topnav {
  overflow: hidden;
  background-color:#40AFA9;
  opacity: 0.5;
  filter: alpha(opacity=50);
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #032E35;
  color: black;
}

.topnav a.active {
  background-color: #29D1E3;
  color: white;
}
.button {
    background-color: #29D1E3; 
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: transparent; 
    color: black; 
    border: 2px solid #29D1E3;
}

.button1:hover {
    background-color: #29D1E3;
    color: white;
}
.h-right {
   
    position:absolute;
    right:800px;
    width: 30%;
    height:70%;
    padding: 10px;
    border: 5px solid transparent;
    margin: auto;
}
.h-left {
   
    position:absolute;
    left:500px;
    width: 30%;
    height:50%;
    padding: 10px;
    border: 5px solid transparent;
    margin: auto;
}
.txtbox{
            display: block;
            float: right;
            height: 22px;
            width: 200px;
}


</style>
</head>



<body>

<div class="bg">
<marquee><h style="color:#29D1E3" ><font size="10"><b>A LIGHTWEIGHT AUTHENTICATION SCHEME FOR E-HEALTH APPLICATION<b></font><h></marquee>
<div class="topnav">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>
<div style="padding-left:16px">
</div>
<marquee><h style="color:#29D1E3" ><font size="5"><b>AUTHENTICATE<b></font><h></marquee>
<div class="h-left">
<form method="POST" class="form-horizontal">
Enter OTP:</b></h>
<input type="text" name="otp"/><br><br>
Enter SESSION ID:</b></h>
<input type="text" name="sid"/><br><br>

<input type="Submit" name="submit" value="AUTHENTICATE"/>
</form>

</div>

<?php
    
    if (isset($_POST['submit']))
{
  $otp=$_POST['otp'];
  $s_id=$_POST['sid'];

  //$url="https://2factor.in/API/V1/92c12af0-fdc2-11e7-a328-0200cd936042/SMS/+91.$mobile/432156";

    $url="https://2factor.in/API/V1/92c12af0-fdc2-11e7-a328-0200cd936042/SMS/VERIFY/$s_id/$otp";
// init the resource
  $ch = curl_init();
  curl_setopt_array($ch, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
//CURLOPT_POSTFIELDS => $postData
//,CURLOPT_FOLLOWLOCATION => true
));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
}

echo $output;

curl_close($ch);

//header('Location: http://localhost/dharsh/Authenticate.php');

}

?>

</body>

</html>