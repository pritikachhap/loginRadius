
<html>
  <body background="e.jpg">
        <?php
//	print_r($_POST);
//        echo $_POST['name'];
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


$params=array();
$params['apikey']="c08974b5fe0ac3235dcee76b38dcea04-us13";
$params = json_encode($params);
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_URL,"https://us13.api.mailchimp.com/2.0/lists/list.json");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
$response_body = curl_exec($ch);

$data = json_decode($response_body);
$array = $data->{'data'};
$groupId = $array[0]->{'id'};


$email = array("email"=>$_POST['email']);
$mergevars=array("FNAME"=>$_POST['name']);
$params = array("id" => $array[0]->{'id'}, "email" => $email, "merge_vars"=>$mergevars);
$params['apikey']="c08974b5fe0ac3235dcee76b38dcea04-us13";
$params = json_encode($params);
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_URL,"https://us13.api.mailchimp.com/2.0/lists/subscribe.json");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
$response_body = curl_exec($ch);

//print_r($response_body);
$data = json_decode($response_body);

if(array_key_exists("status",$data) && $data->{'status'}== "error")
    $result = $email['email']." has already been subscribed" ;
else 
    $result = $email['email']." has been successfully subscribed";

//echo $result;

?>
        
    <div id="main" style="padding:20px;">
        <div id="demo">
            <h1 style="color:black"><?php echo $result ?></h1>
        </div>
    <img src="logo.png"  style="margin:100px 10px 0px 450px;width:304px;height:228px;">
    
     </div>
    </body>
    </html>