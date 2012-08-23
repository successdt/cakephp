<div class="SlideMenuDiv">
<table class="SlideMenuTable">
<?php
$categories = ClassRegistry::init('Category')->find('all');
$this->set('categories', $categories);
foreach ($categories as $category): ?>
<tr>
<td class="Ploai"><?php echo $category['Category']['TenPLoai'] ?></td>
</tr>
<?php endforeach ?>
</table>
</div>