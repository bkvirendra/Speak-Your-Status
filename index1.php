  <?php

    require 'facebook.php';

    $facebook = new Facebook(array(
    'appId'  => '204674169621376',
    'secret' => 'e13b62f1065788d388cb456a7b5ad632'
    ));
	
	$user = $facebook->getUser();

    $loginUrl   = $facebook->getLoginUrl(
            array(
                'scope'         => 'publish_stream',
                'redirect_uri'  => 'http://apps.facebook.com/speakyourstatus/'
            )
    );
	$logoutUrl  = $facebook->getLogoutUrl();

	if ($user) {
           try {
    $user_profile = $facebook->api('/me');
	$user_id= $user;
      } catch (FacebookApiException $e) {
		  echo 'Error';
          error_log($e);
          $user = null;
      }
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Speak Your Status</title>
<link href="screen.css" media="screen" rel="stylesheet" type="text/css" />
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 204674169621376, // App ID
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
   }(document));
</script>
<script>
function updateStatus(){
                var status  =   document.getElementById('status').value;
                    FB.api('/me/feed', 'post', { message: status }, function(response) {
                        if (!response || response.error) {
                             alert('Error occured');
                        } else {
                             alert('Status updated Successfully');
                        }
                   });
	   }
</script>
<p align="center"><img src="coollogo.png"></p>
    <?php if ($user) { ?>
    <?php } else { ?>
	  <strong> <p align="center" class="style1">Welcome !</strong>
      <p align="center"><a href="http://www.facebook.com/dialog/oauth?client_id=204674169621376&redirect_uri=http://apps.facebook.com/speakyourstatus/&scope=publish_stream" class="myButton" target="_blank">Click here to Enter</a></p>
    <?php } ?>
<?php if ($user){ ?>
<form action="" method="">
  <label for="status">Update Status</label>
  <input type="text" id="status" name="status" size="60" VALUE="Whats on Your mind"/>
  <div align="right" style="height:30px; padding:10px 10px;">
    <label id="shareButton">
      <input type="button" onclick="updateStatus(); return false;" value="Share">
    </label>
 </div>
</form>
<?php } ?>
</body>
</html>
