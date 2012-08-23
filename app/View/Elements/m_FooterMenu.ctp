<?php

/**
 * @author duythanh
 * @copyright 2012
 */
$categories = ClassRegistry::init('menu')->find('all', array('conditions' =>
        array('Type' => 'TopMenu')));
$this->set('categories', $categories);
?>
<?php foreach ($categories as $category):?>
    <?php 
        echo $this->Html->link($category['menu']['Name'], 
            array(
                "controller" => $category['menu']['controller'],
                "action" => $category["menu"]["action"],
                $category["menu"]["var"]
            ),
            array('data-role'=>'button')  
    )?>
<?php endforeach ?>
