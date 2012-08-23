<?php

/**
 * @author duythanh
 * @copyright 2012
 */
?>
<?php
$link = Router::url($this->here, false);
?>
<!-- Facebook API -->
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
} else {
    $user_profile = array('name' => 'Tên hiển thị');
}
if ($user) {
    $logoutUrl = $facebook->getLogoutUrl();
} else {
    $loginUrl = $facebook->getLoginUrl(array('scope' => 'publish_stream'));
}

//debug($user_profile);

?>
<!-- end Facebook API -->



<!-- Script -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=401582569900520";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- end script -->
<!-- twitter script -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<!-- Ajax -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#post_button').click(function(){
            $('.css_div').append('<?php echo $this->Html->image('icons/ajax-loader.gif'); ?>')
            $.post('http://localhost/mcake/comments/fbshare',{link:$('#link').val(),comment:$('textarea#post').val(),post_id:$('#postid').val()},function(result){$("#share_button").html(result)});
        });
    });
    
</script>








<!-- Hiển thị bài viết -->
<?php echo $this->form->create('', array('action' => '../comments/save', 'name' =>
    'data[postName]')); ?>
<div data-role="collapsible" data-collapsed="false">
<?php foreach ($posts as $post): ?>
        <h2><?php echo $post['Blog']['title'] ?></h2>
<?php echo str_replace($this->Common->
    date_find(), '', $post['Blog']['pubDate']); //echo $post['Blog']['created'] ?>
    <?php //echo $post['Blog']['author'] ?>

<?php
    $post['Blog']['description'] = str_replace("width='120'", 'width=480', $post['Blog']['description']);
    $post['Blog']['description'] = str_replace("height='90'", "height='300'", $post['Blog']['description']);
    $post['Blog']['description'] = str_replace("size=\"2\"", "size='3'", $post['Blog']['description']);
    echo $post['Blog']['description'];
?>

<input id="postid" name="posts_id" type="hidden" value="<?php echo $post['Blog']['id'] ?>" />
<?php endforeach ?>
</div>




<!-- Social -->
<div  data-role="controlgroup" data-type="horizontal">
    <a  href="https://twitter.com/share" class="twitter-share-button" data-url="http://localhost<?php echo $link ?>">Tweet</a>
    <div class="fb-like" style="width: auto;" data-href="http://localhost<?php echo $link?>" data-send="false" data-layout="button_count" data-width="20" data-show-faces="true"></div>
</div>
<a href="<?php echo $post['Blog']['link'] ?>" data-role="button" >Mua ngay</a>
    <div id="share_button"  data-role="collapsible" data-collapsed="true" data-inline="true">
        <h2>Share on Facebook</h2>
        <?php echo $this->form->input('post', array(
            'label' => '',
            'type' => 'textarea',
            'id' => 'post')) ?>
        <div class="css_div" data-role="button" id="post_button">Post to Facebook</div>
    </div>  





 <!-- Hiển thị các comments -->
    <?php foreach ($comments as $comment): ?>
    <div data-role="collapsible" data-collapsed="false">
            <h2><?php echo $comment['comments']['author'] ?> nói:</h2>
            <p ><?php echo $comment['comments']['comment'] ?></p>
            <p><small><?php echo $comment['comments']['created'] ?></small></p>
    </div>
    <?php endforeach ?>
    
<!-- Thêm comment mới -->    
<div data-role="collapsible" data-collapsed="false">    
     <h2>Write a comment....</h2> 
    <?php echo
    $this->form->input('name', array(
        'label' => '',
        'size' => '50',
        'name' => 'author',
        'class' => 'custom_input',
        'value' => $user_profile['name'])); ?>                       
    <?php if (!$user) { ?>
    <a href="<?php echo $loginUrl ?>">
    <?php echo $this->Html->image('icons/fb_login.jpg', array('alt' =>
    'fb_login')) ?> 
    </a> 
    <?php } ?>
    <?php echo $this->form->input('email', array
    (
        'label' => 'Email',
        'size' => '50',
        'class' => 'custom_input',
        'name' => 'email')); ?>  
    <?php echo $this->form->input('comment',
    array(
        'type' => 'textarea',
        'label' => 'Comment',   
        'class' => 'custom_input',
        'name' => 'comment')) ?>
    
    <?php echo $this->form->input('', array(
        'name' => 'link',
        'type' => 'hidden',
        'value' => $link)) ?>
    <?php echo $this->form->input('', array(
        'name' => 'title',
        'type' => 'hidden',
        'value' => $post['Blog']['title'])) ?>
    <?php  echo $this->form->input('link', array(
        'type' => 'hidden',
        'value' => $link,
        'id' => 'link',
        'label' => ''))  ?>
    <div data-theme="d">
        <label for="fb-option">Post on your wall</label>
        <select name="fb-option" id="flip-min" data-role="slider">
        	<option value="1">Yes</option>
        	<option value="0">No</option>
        </select>
    </div>
<?php echo $this->form->end(array('label' => 'Send', 'class' =>'css_button')); ?>
</div>
