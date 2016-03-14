
<html>

<head>
<script src="//hub.loginradius.com/include/js/LoginRadius.js"></script>

<script type="text/javascript">
 function loginradius_interface(){ 
    $ui = LoginRadius_SocialLogin.lr_login_settings;
    $ui.interfacesize = "small";
    $ui.apikey = "3081fe01-ea90-4e5f-b573-72b96f2a92d3";
    $ui.callback = "http://localhost/loginradius/RetriveDetails.php";
    $ui.protocol = "http://"; /*or "https://"*/
    $ui.lrinterfacecontainer ="interfacecontainerdiv";
    LoginRadius_SocialLogin.init(options);
  }
  var options={}; 
  options.login=true;
  LoginRadius_SocialLogin.util.ready(loginradius_interface);
</script>
                                    
</head>


<body background="e.jpg">
<?php
include_once "LoginRadiusSDK/LoginRadius.php";
include_once "LoginRadiusSDK/LoginRadiusException.php";
include_once "LoginRadiusSDK/SocialLogin/GetProvidersAPI.php";
include_once "LoginRadiusSDK/SocialLogin/SocialLoginAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/UserAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/AccountAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/CustomObjectAPI.php";
	

?>
    <div id="main" style="margin:100px 10px 0px 450px; padding:20px;">
     
    <img src="logo.png"  style="width:304px;height:228px;">
    <div id="interfacecontainerdiv" class="interfacecontainerdiv" style="margin:0px 10px 20px 230px;background-color:lightgrey; color:white; padding:20px;" ></div>
    </div>                              
                                    
</body>

</html>