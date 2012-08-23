<?php

/**
 * @author duythanh
 * @copyright 2012
 */
$categories = ClassRegistry::init('menu')->find('all', array('conditions' =>
        array('Type' => 'TopMenu')));
$this->set('categories', $categories);
?>
<table id='top_menu_table'>
    <tr>
<?php
foreach ($categories as $category):
?>
        <td class="space"></td>
        <td>
            <?php echo $this->Html->link($category['menu']['Name'], array(
        "controller" => $category['menu']['controller'],
        "action" => $category["menu"]["action"],
        $category["menu"]["var"])) ?>
            
        </td>
        <?php endforeach ?>
    </tr>
</table>

