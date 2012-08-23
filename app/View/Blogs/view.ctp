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
        $('#share_button').click(function(){
            $('#fb_post').slideToggle();
        });
        $('#post_button').click(function(){
            $('.fb-share').append('<?php echo $this->Html->image('icons/ajax-loader.gif'); ?>')
            $.post('http://localhost/cakephp/comments/fbshare',{link:$('#link').val(),comment:$('textarea#post').val(),post_id:$('#postid').val()},function(result){$(".fb-share").html(result)});
        });
    });
</script>



<!-- Hiển thị bài viết -->
<?php echo $this->form->create('', array('action' => '../comments/save', 'name' =>
    'data[postName]')); ?>
<?php foreach ($posts as $post): ?>
<div class="post-item" id="<?php echo $post['Blog']['id'] ?>">
        <h2><?php echo $post['Blog']['title'] ?></h2>
        <table class="infor_table">
            <tr>
            <td class="created_info"><?php echo str_replace($this->Common->
    date_find(), '', $post['Blog']['pubDate']); //echo $post['Blog']['created'] ?></td>
            <td class="space"></td>
            <td class="author_info"><?php //echo $post['Blog']['author'] ?></td>
            </tr>
        </table>

        <?php
    $post['Blog']['description'] = str_replace("width='120'", 'width=480', $post['Blog']['description']);
    $post['Blog']['description'] = str_replace("height='90'", "height='300'", $post['Blog']['description']);
    $post['Blog']['description'] = str_replace("size=\"2\"", "size='3'", $post['Blog']['description']);
    echo $post['Blog']['description'];
?>
         
</div>
<input id="postid" name="posts_id" type="hidden" value="<?php echo $post['Blog']['id'] ?>" />
<?php endforeach ?>





<!-- Social -->

<div class="post-item">
    
    
    <table>
        <tr>
            <td>
                <div class="css_div"><a href="<?php echo $post['Blog']['link'] ?>">Mua ngay</a></div>
            </td>
            <td>
                <?php echo $this->form->input('link', array(
    'type' => 'hidden',
    'value' => $link,
    'id' => 'link',
    'label' => '')) ?>
               <div class="fb-share">
                    <div id="share_button"><?php echo $this->Html->image('icons/fb_share.jpg',
array('alt' => 'fb_share', 'title' => 'share with facebook')) ?></div>
                    <div id="fb_post" style="display: none;border-radius: 5px;border: #000 1px solid;">
                        <?php echo $this->form->input('post', array(
    'label' => '',
    'type' => 'textarea',
    'id' => 'post')) ?>
                        <div class="css_div" id="post_button">Post to Facebook</div>
                    </div>
                </div>
            </td>
            <td>
                <div class="fb-like" style="width: auto;" data-href="http://localhost<?php echo $link?>" data-send="false" data-layout="button_count" data-width="20" data-show-faces="true"></div>
            </td>
            <td>
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://localhost<?php echo $link ?>">Tweet</a>
            </td>
        </tr>
    </table>
</div>





 <!-- Hiển thị các comments -->
<div class="xcomment">
    <?php foreach ($comments as $comment): ?>
    <div class="comment-inner">
        <div class="comment-info">
            <p class="p1"><?php echo $comment['comments']['author'] ?> nói:</p>
            <p class="p2"><?php echo $comment['comments']['created'] ?></p>
        </div>
            <p ><?php echo $comment['comments']['comment'] ?></p>
    </div>
    <?php endforeach ?>
    
    
    
    
<!-- Thêm comment mới -->  
        <table>
            <tr>
                <td><img style="border-radius: 3px;" src="https://graph.facebook.com/<?php echo
$user; ?>/picture" alt="avatar"/></td><td><?php echo
$this->form->input('name', array(
    'label' => '',
    'size' => '50',
    'name' => 'author',
    'class' => 'custom_input',
    'value' => $user_profile['name'])); ?> 
                </td> 
                <td> 
                      
                    <?php if (!$user) { ?>
                    <a href="<?php echo $loginUrl ?>">
                    <?php echo $this->Html->image('icons/fb_login.jpg', array('alt' =>
'fb_login')) ?> 
                    </a> 
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Email:</td><td><?php echo $this->form->input('email', array
(
    'label' => '',
    'size' => '50',
    'class' => 'custom_input',
    'name' => 'email')); ?>  

                </td>
            </tr>
            <tr>
                <td>Comment</td><td><?php echo $this->form->input('comment',
array(
    'type' => 'textarea',
    'label' => '',
    'cols' => '60',
    'class' => 'custom_input',
    'name' => 'comment')) ?>

                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->form->input('', array(
    'name' => 'link',
    'type' => 'hidden',
    'value' => $link)) ?>
                    <?php echo $this->form->input('', array(
    'name' => 'title',
    'type' => 'hidden',
    'value' => $post['Blog']['title'])) ?>
                    
                </td>
                <td>
                    
                    <?php echo $this->form->checkbox('fb-option',array('value'=>'1', 'name'=>'fb-option','checked'=>'checked')) ?>
                    Đăng lên tường nhà bạn
                </td>

            </tr>
            <tr>
                <td> <?php echo $this->form->end(array('label' => 'Gửi', 'class' =>'css_button')); ?>
                </td>
            </tr>
        </table>


</div>
