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
                'redirect_uri'  => 'http://apps.facebook.com/speakyourstatus/speakyourstatus.php'
            )
    );
	$logoutUrl  = $facebook->getLogoutUrl();

	if ($user) {
           try {
    $user_profile = $facebook->api('/me');
	$user_id= $user;
      } catch (FacebookApiException $e) {
		  echo 'Please Login';
          error_log($e);
          $user = null;
      }
     }
	 if (!$user) {
        echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
        exit;
    }
?>