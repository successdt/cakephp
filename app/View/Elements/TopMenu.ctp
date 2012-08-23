<?php

/**
 * @author duythanh
 * @copyright 2012
 */
$categories = ClassRegistry::init('menu')->find('all', array('conditions' =>
        array('Type' => 'TopMenu')));
$this->set('categories', $categories);
?>
<!-- script for jump-list-->
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>

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
<form name="jump" id="jump">
    <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">>
        <option>Chuyển đến...</option>
        <?php foreach ($categories as $category):?>
        <option value="http://localhost/cakephp/<?php echo $category['menu']['controller'].'/'.$category['menu']['action'] ?>"><?php echo $category['menu']['Name'] ?></option>
        <?php endforeach ?>
    </select>
</form>

