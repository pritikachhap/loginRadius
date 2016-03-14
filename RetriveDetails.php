<html>
    
<body background="e.jpg">
<?php
include_once "LoginRadiusSDK/LoginRadius.php";
include_once "LoginRadiusSDK/LoginRadiusException.php";
include_once "LoginRadiusSDK/SocialLogin/GetProvidersAPI.php";
include_once "LoginRadiusSDK/SocialLogin/SocialLoginAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/UserAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/AccountAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/CustomObjectAPI.php";
define('LR_APP_NAME', 'http://localhost/loginradius/'); // Replace LOGINRADIUS_SITE_NAME_HERE with your site name that provide in LoginRadius account.
define('LR_API_KEY', '3081fe01-ea90-4e5f-b573-72b96f2a92d3'); // Replace LOGINRADIUS_API_KEY_HERE with your site API key that provide in LoginRadius account.
define('LR_API_SECRET', '2ea53ae3-86c8-41ea-b8d4-c0be6106640b'); // Replace LOGINRADIUS_API_SECRET_HERE with your site Secret key that provide in LoginRadius account.


use LoginRadiusSDK\LoginRadius;
use LoginRadiusSDK\LoginRadiusException;
use LoginRadiusSDK\SocialLogin\GetProvidersAPI;
use LoginRadiusSDK\SocialLogin\SocialLoginAPI;
use LoginRadiusSDK\CustomerRegistration\UserAPI;
use LoginRadiusSDK\CustomerRegistration\AccountAPI;
use LoginRadiusSDK\CustomerRegistration\CustomObjectAPI;


$json = file_get_contents("https://api.loginradius.com/api/v2/access_token?token=".$_REQUEST['token']. "&secret=".LR_API_SECRET); // this WILL do an http request for you
$data = json_decode($json);
$access_token = $data->{'access_token'};

$json = file_get_contents("https://api.loginradius.com/api/v2/userprofile?access_token=". $access_token); // this WILL do an http request for you
$data = json_decode($json);
$array = $data->{'Email'};
$name = $data->{'ProfileName'};
$email = $array[0]->{'Value'};
//$email = 'pritikachhap@gmail.com';


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
?>
 <div style="margin:100px;color:white; padding:20px;">    
 <form action="status.php"  method="post"  >
  Enter valid Email Address:<br>
  <input type="text" name="email" value="some@gmail.com"><br>
  <input type='hidden' id= 'hiddenField' name='name' value='' />
  <input type="submit" value="ok" onclick='addParam()' >
</form> 
</div> 
 <script> 
  function addParam() {
     document.getElementById('hiddenField').value = "<?php echo $name; ?>";
     //document.getElementById("myForm").submit();
   }
</script>
<?php
}
?>
<div id="main" style="padding:20px;">      
    <img src="logo.png"  style="margin:100px 10px 0px 450px;width:304px;height:228px;">
</div>
 </body>
</html>