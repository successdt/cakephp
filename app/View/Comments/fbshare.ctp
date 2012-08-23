<?php

/**
 * @author duythanh
 * @copyright 2012
 */



?>
<?php
App::import('vendor', 'facebook');
$facebook = new Facebook(array(
    'appId' => '401582569900520',
    'secret' => 'ab59e37c3a280b39dca8658fcf7fad66',
    'perms' => 'offline_access, user_groups, publish_stream,publish_actions',
    'cookie' => true
    ));

// Get User ID
$user = $facebook->getUser();
if ($user) {
    try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
    }
    catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
        //echo $e;
    }
}
?>
<?php
    if($user){  
        try{
        	$statusUpdate = $facebook->api("/$user/feed", 'post', array(
                   'access_token'=>$facebook->getAccessToken(),
                    'message'=> $comment,
                    'link'=>"localhost.com".$links,
                ));                      
        }catch(FacebookApiException $e){
        	error_log($e);
            echo $e;
        }
    } 
        
 ?>
 <?php if($statusUpdate['id']){ ?>
 <?php setcookie('fb'.$post_id,$statusUpdate['id']);?>
    <strong>shared</strong>    
 <?php } ?>