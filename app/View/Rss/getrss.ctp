<div class="post-item">
<?php
//debug($data);
if(!$data)
    echo "Không có thông tin nào được thêm vào";
foreach ($data as $temp_item):

    /*
    echo " ".$temp_item['channel']['item']." ";
    debug($temp_item);
    echo " ".$temp_item['Body']['Password']." ";
    foreach ($temp_item['channel']['item'] as $data) {
    echo "<p>" . $data['title'] . "</p>";
    }
    */

?>
<p>Đã lưu: <?php echo $temp_item; ?></p>
<?php
endforeach;
?>	
</div>