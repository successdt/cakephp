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
    'cookie' => true));

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
debug($data);
if($user){
    if (isset($_COOKIE['fb' . $data['posts_id']])) {
        try {
            $comment = $facebook->api("/" . $_COOKIE['fb' . $data['posts_id']] . "/comments",
                'post', array('access_token' => $facebook->getAccessToken(), 'message' => $data['comment']));
        }
        catch (FacebookApiException $e) {
            error_log($e);
            echo $e;
        }
    }
    else{
        try{
            $statusUpdate = $facebook->api("/$user/feed", 'post', array(
            'access_token'=>$facebook->getAccessToken(),
            'link'=>"localhost.com".$data['link'],
            ));
            $comment= $facebook->api("/".$statusUpdate['id']."/comments",'post', array('access_token' => $facebook->getAccessToken(), 'message' => $data['comment']));
            setcookie('fb'.$data['posts_id'],$statusUpdate['id']);                    
        }catch(FacebookApiException $e){
            error_log($e);
            echo $e;
        }
    }
}
header('..view/'.$data['posts_id']);