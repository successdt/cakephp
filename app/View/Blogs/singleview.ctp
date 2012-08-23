<?php

/**
 * @author duythanh
 * @copyright 2012
 */



?>

 <div >
 <?php foreach($items as $item):?>
<h3><?php echo $this->Html->link($item['Blog']['title'], array(
        'controller' => 'blogs',
        'action' => 'view',
        $item['Blog']['id'],
        Inflector::slug($item['Blog']['title'], '-') . '.html')) ?>
</h3>
 <p><?php
    $item['Blog']['description']=str_replace("width='120'",'width=480',$item['Blog']['description']);
    $item['Blog']['description']=str_replace("height='90'","height='300'",$item['Blog']['description']);
    $item['Blog']['description']=str_replace("size=\"2\"","size='3'",$item['Blog']['description']);
    echo $item['Blog']['description'];
  ?></p>
 <?php endforeach ?>
 </div>
 <div style="border-left: 1px solid #000;">
 
 </div>