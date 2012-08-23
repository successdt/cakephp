<?php

/**
 * @author duythanh
 * @copyright 2012
 */
?>
<div class="post-item">
    <?php echo $this->form->create( array('action' => '../rss/getrss')) ?>
<select name="link_id">   
<?php
$option=array(); 
$link = ClassRegistry::init('rsslink')->find('all');
foreach($link as $lnk): ?>
<option value="<?php echo $lnk['rsslink']['id'] ?>"><?php echo $lnk['rsslink']['name'] ?></option>
<?php endforeach ?>
</select> 
<?php echo $this->form->end(array('label' => 'Get', 'class' => 'css_button')); ?>
</div>