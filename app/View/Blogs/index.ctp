<?php

/**
 * @author duythanh
 * @copyright 2012
 */

?>
<div class="post-item">
    <div class="css_div"><?php echo $this->Paginator->sort('Blog.pubDate','Sắp xếp theo ngày đăng'); ?></div>
    <div class="css_div"><?php echo $this->Paginator->sort('Blog.category_id','Sắp xếp theo loại'); ?></div>
    <div class="css_div"><?php echo $this->Paginator->sort('Blog.title','Sắp xếp tiêu đề'); ?></div>
</div>
<div class="post-item">
    <div class="paging">
            <div class="page_conner"><?php echo $this->Paginator->first('First'); ?></div>            
            <div class="page_conner"><?php echo $this->Paginator->prev('<'.__('',true),array(),null,array('class'=>'disable')); ?></div>
            <div class="page_conner"><?php echo $this->Paginator->numbers(array('separator'=>'</div><div class="page_conner">')); ?></div>
            <div class="page_conner"><?php echo $this->Paginator->next('>'.__('',true),array(),null,array('class'=>'disable')); ?></div>
            <div class="page_conner"><?php echo $this->Paginator->last('Last');?></div>
    </div>
</div>
<?php foreach ($posts as $post): ?>
<div class="post-item" id="<?php echo $post['Blog']['id'] ?>">
    <div class="info">
        <table class="infor_table">
            <tr></tr>
            <tr>
                <td class="created_info">
                    <?php echo str_replace($this->Common->date_find(), '', $post['Blog']['pubDate']); //echo $post['Blog']['created'] ?>
                </td>
            </tr>
            <!--  <tr><td class="author_info"><?php //echo $post['Blog']['author'] ?></td></tr>-->
            <tr><td class="folder_info"><?php echo $post['Cat']['name'] ?></td></tr>
        </table>
    </div>
    <div class="metadata">
        <h2><?php echo $this->Html->link($post['Blog']['title'], array(
        'controller' => 'blogs',
        'action' => 'view',
        $post['Blog']['id'],
        Inflector::slug($post['Blog']['title'], '-') . '.html')) ?></h2>
        <p><?php
            $post['Blog']['description']=str_replace("width='120'",'width=480',$post['Blog']['description']);
            $post['Blog']['description']=str_replace("height='90'","height='300'",$post['Blog']['description']);
            $post['Blog']['description']=str_replace("size=\"2\"","size='3'",$post['Blog']['description']);
            echo $post['Blog']['description']; 
            ?>
        </p>
    </div>
    <div class="read_more_div">
        <?php echo $this->Html->link('Đọc tiếp', array(
        'controller' => 'blogs',
        'action' => 'view',
        $post['Blog']['id'],
        Inflector::slug($post['Blog']['title'], '-') . '.html'), array('class' =>
            'read_more')) ?>
    </div>
    
</div>
<?php endforeach ?>
<!-- Phân trang -->
<div class="post-item">
    <div class="paging">
            <div class="page_conner"><?php echo $this->Paginator->first('First'); ?></div>            
            <div class="page_conner"><?php echo $this->Paginator->prev('<'.__('',true),array(),null,array('class'=>'disable')); ?></div>
            <div class="page_conner"><?php echo $this->Paginator->numbers(array('separator'=>'</div><div class="page_conner">')); ?></div>
            <div class="page_conner"><?php echo $this->Paginator->next('>'.__('',true),array(),null,array('class'=>'disable')); ?></div>
            <div class="page_conner"><?php echo $this->Paginator->last('Last');?></div>
    </div>
    
</div>
<div class="post-item">
    <div class="css_div"><?php echo $this->Paginator->sort('Blog.pubDate','Sắp xếp theo ngày đăng'); ?></div>
    <div class="css_div"><?php echo $this->Paginator->sort('Blog.category_id','Sắp xếp theo loại'); ?></div>
    <div class="css_div"><?php echo $this->Paginator->sort('Blog.title','Sắp xếp tiêu đề'); ?></div>
</div>