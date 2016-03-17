<html>
    
<body background="e.jpg">
  <div id="main" style="padding:20px;">      
    <img src="logo.png"  style="margin:120px 10px 0px 450px;width:304px;height:228px;">
</div>
    <script>
    function ValidateEmail(mail)   
    {  
     if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
      {  
        return (true)  
      }  
        alert("You have entered an invalid email address!")  
        return (false)  
    }  
    </script>
    
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

    $json = file_get_contents("https://api.loginradius.com/api/v2/access_token?token=" . $_REQUEST['token'] . "&secret=" . LR_API_SECRET); // this WILL do an http request for you
    $data = json_decode($json);
    $access_token = $data->{'access_token'};

    $json = file_get_contents("https://api.loginradius.com/api/v2/userprofile?access_token=" . $access_token); // this WILL do an http request for you
    $data = json_decode($json);
    $name = $data->{'ProfileName'};
    $array = $data->{'Email'};
    $email = "";
    if (array_key_exists("0", $data))
        $email = $array[0]->{'Value'};

//$email = 'pritikachhap@gmail.com';
    ?>

    <div style="margin:100px;color:white; padding:20px;">    
        <form id="form" action="status.php"  method="post" >
            <input type="hidden" id="hiddenName" name='name' value="<?php echo $name; ?>" /><br>
            <input type="hidden" id="hiddenEmail" name='email' value=" <?php echo $email; ?>" />
        </form> 
    </div>

    <?php
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        ?>

        <script>    
         while(true)
               {
                var email = prompt("Enter valid Email Address");
                if(ValidateEmail(email))
                {
                    document.getElementById("hiddenEmail").value = email;
                    break;
            }
            }  
    </script>
        <?php
    }
    ?>
    <script> 
   document.getElementById("form").submit();
    </script>
</body>
</html>