<?php

/**
 * @author duythanh
 * @copyright 2012
 */
$categories = ClassRegistry::init('categories')->find('all');
$this->set('categories', $categories);

?>
<ul data-role="listview" data-theme="c" data-inset="true" data-filter="false">
<?php foreach ($categories as $category):?>
    <li>
    <?php 
        echo $this->Html->link($category['categories']['name'], array(
            "controller" => "blogs",
            "action" =>"viewcat",
            $category['categories']['id'])) ?>
    </li>
        <?php endforeach ?>
</ul>
