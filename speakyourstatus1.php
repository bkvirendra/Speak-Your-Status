<?php

    require 'fbmain.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Speak Your Status</title>
<link href="screen.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="dialog_box.css" />
<script type="text/javascript" src="dialog_box.js"></script>
<style type="text/css">
<!--
.style2 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 16px;
}
-->
</style>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("button").click(function(){
                    function updateStatus(){
                    var status  =   document.getElementById('status').value;
                    $.ajax({
                    type: "POST",
                    url: "submit.php",
                    data: "status=" + status,
                    success: function(msg){
                        alert(msg);
                    },
                    error: function(msg){
                        alert(msg);
                   }
				}
            });
        });
});
</script>
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
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=204674169621376";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<p align="center"><img src="coollogo.png"></p>
<?php if ($user){ ?>
<h1 align="center" class="nosupport">Your browser does not support webkit speech. We recommend you to try Google Chrome.</h1>
<p align="center" class="nosupport"><a href="https://www.google.com/chrome" target="_blank"><img src="chrome-banner.jpg"></a>
<div class="fb-like" data-href="http://www.facebook.com/TeckZoneIn" data-send="true" data-width="450" data-show-faces="true"></div>
<form action=" " method=" ">
<div align="center" class="UIComposer_Box">
<span class="w">
<label for="status">Update Status</label>
<input type="text" id="status" name="status" onFocus="if (this.value=='Whats on Your mind') this.value = ''" x-webkit-speech="x-webkit-speech" size="60" rows="5" VALUE="Whats on Your mind"/>
</span>
<div align="right" style="height:30px; padding:10px 10px;">
<label id="shareButton">
<input type="button" onClick="updateStatus(); return false;" value="Share" class="uiButtonLarge uiButtonShare">
</label>
</div>
</div>
</form>
<p>
  <script>
if (document.createElement("input").webkitSpeech === undefined) {
	var ns = document.getElementsByClassName("nosupport");
	for (i = 0, il = ns.length; i < il; i++) ns[i].style.display = "block";
}
</script>
  <?php } ?>
</p>
<p class="style2">Here's a <a href="http://teckzone.in/myfbapps/speakyourstatus/tutorial.php" target="_blank">Getting Start Tutorial for you</a>! </p>
<p class="style2">Note:- Click on this <img src="Google-Voice-Search-1.png" width="21" height="25"> in the Share Box and Speak &quot;Whats on your Mind&quot; </p>
<p align="center" class="style1"><a href="http://www.facebook.com/TheVirendraRajput" target="_blank" class="style1">A Virendra Rajput Production</a></p>
</body>
</html>