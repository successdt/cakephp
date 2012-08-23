<?php

/**
 * @author duythanh
 * @copyright 2012
 */
?>
<div data-role="controlgroup" data-type="horizontal">
    <div data-role="button" data-icon="gear">Sắp xếp:</div>
    <?php echo $this->Paginator->sort('Blog.pubDate','Ngày đăng',array('data-role'=>'button','data-icon="arrow-u"')); ?>
    <?php echo $this->Paginator->sort('Blog.category_id','Danh mục',array('data-role'=>'button','data-icon="arrow-u"')); ?>
    <?php echo $this->Paginator->sort('Blog.title','Tiêu đề',array('data-role'=>'button','data-icon="arrow-u"')); ?>  
</div>
<div  data-theme="c" data-role="ui-bar-d" data-inline="true">
        <?php echo $this->Paginator->first('First',array('data-role'=>'button','data-inline'=>'true')); ?>       
        <?php echo $this->Paginator->prev('<'.__('',true),array('data-role'=>'button','data-inline'=>'true'),null,array('class'=>'disable',)); ?>
        <?php echo $this->Paginator->numbers(array('separator'=>'','data-role'=>'button','data-inline'=>'true','modulus'=>'6')); ?>
        <?php echo $this->Paginator->next('>'.__('',true),array('data-role'=>'button','data-inline'=>'true'),null,array('class'=>'disable',)); ?>
        <?php echo $this->Paginator->last('Last',array('data-role'=>'button','data-inline'=>'true'));?>
</div>
<ul  data-role="listview" data-theme="d" data-inset="true" data-filter="false">
<?php foreach ($posts as $post): ?>
    <li>
        <?php 
            $str=split('src="',$post['Blog']['description']);
            $img_url=split('"',$str[1]);
            //Lọc lấy link ảnh
        ?> 
        <?php
            $display= $this->Html->image($img_url[0],array('alt'=>'thumbnail')).$post['Blog']['title']."<br /><small>".str_replace($this->Common->date_find(), '', $post['Blog']['pubDate'])."-".$post['Cat']['name']."</small>";
            echo $this->Html->link($display, 
                array(
                    'controller' => 'blogs',
                    'action' => 'view',
                    $post['Blog']['id'],
                    Inflector::slug($post['Blog']['title'], '-') . '.html'),
                array('escape' => false)) ?>
        <?php //echo str_replace($this->Common->date_find(), '', $post['Blog']['pubDate']); //echo $post['Blog']['created'] ?>
        <?php /*
            $post['Blog']['description']=str_replace("width='120'",'width=480',$post['Blog']['description']);
            $post['Blog']['description']=str_replace("height='90'","height='300'",$post['Blog']['description']);
            $post['Blog']['description']=str_replace("size=\"2\"","size='3'",$post['Blog']['description']);
            echo substr($post['Blog']['description'],0,900)."..."; 
            */
        ?>


        <?php /* echo $this->Html->link('Đọc tiếp', array(
        'controller' => 'blogs',
        'action' => 'view',
        $post['Blog']['id'],
        Inflector::slug($post['Blog']['title'], '-') . '.html'), array('class' =>
            'read_more')) */ ?>
    </li>
<?php endforeach ?>
</ul>
<!-- Phân trang -->
<div  data-theme="d" data-role="ui-bar-d" data-inline="true">
        <?php echo $this->Paginator->first('First',array('data-role'=>'button','data-inline'=>'true')); ?>       
        <?php echo $this->Paginator->prev('<'.__('',true),array('data-role'=>'button','data-inline'=>'true'),null,array('class'=>'disable',)); ?>
        <?php echo $this->Paginator->numbers(array('separator'=>'','data-role'=>'button','data-inline'=>'true','modulus'=>'6')); ?>
        <?php echo $this->Paginator->next('>'.__('',true),array('data-role'=>'button','data-inline'=>'true'),null,array('class'=>'disable',)); ?>
        <?php echo $this->Paginator->last('Last',array('data-role'=>'button','data-inline'=>'true'));?>
</div>

<div data-role="controlgroup" data-type="horizontal">
    <div data-role="button" data-icon="gear">Sắp xếp:</div>
    <?php echo $this->Paginator->sort('Blog.pubDate','Ngày đăng',array('data-role'=>'button','data-icon="arrow-u"')); ?>
    <?php echo $this->Paginator->sort('Blog.category_id','Danh mục',array('data-role'=>'button','data-icon="arrow-u"')); ?>
    <?php echo $this->Paginator->sort('Blog.title','Tiêu đề',array('data-role'=>'button','data-icon="arrow-u"')); ?>  
</div>