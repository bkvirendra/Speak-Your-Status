<?php
    require 'fbmain.php';

    if ($user){
        //update user's status using graph api
        if (isset($_POST['status'])) {
            try {
                $status       = $_POST['status'];
                $statusUpdate = $facebook->api('/me/feed', 'post', array('message'=> $status);
            } catch (FacebookApiException $e) {
				echo "Error";
            }
            echo "Status Update Successfull. ";
            exit;
        }
    }
?>