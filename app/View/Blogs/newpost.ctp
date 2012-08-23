<?php

/**
 * @author duythanh
 * @copyright 2012
 */


echo $this->Html->script('tiny_mce');
?>   
<script type='text/javascript'>
    tinyMCE.init({
     mode : 'textareas'
    });
</script>
<div class="post-item">
<?php echo $this->form->create(array('action'=>'save')); ?>
<?php echo $this->form->input('',array('label'=>'','name'=>'body','type'=>'textarea','cols'=>'80','rows'=>'50')) ?>
<table>
    <tr>
        <td>Tiêu đề:</td><td><?php echo $this->form->input('',array('type'=>'text','size'=>'60','name'=>'title','label'=>'')); ?></td>
    </tr>
    <tr>
        <td>Thư mục:</td><td><?php  echo $this->form->input('',array('type'=>'text','size'=>'60','name'=>'folder','label'=>''));?></td>
    </tr>
    <tr>
        <td><?php echo $this->form->input('author',array('type'=>'hidden','name'=>'author','value'=>$author)) ?></td>
    </tr>
</table>
<?php
echo $this->form->end(array('class'=>'css_button','value'=>'Lưu'));
?>
</div>