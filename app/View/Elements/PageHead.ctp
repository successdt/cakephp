<?php

/**
 * @author duythanh
 * @copyright 2012
 */



?>

<div id="post">
</div>


<?php  echo $this->Ajax->remoteTimer(
    array(
        'url'=>array( 'controller' => 'blogs', 'action' => 'singleview'), 
        'update'=>array( 'update' => 'post' ),
        'frequency' => 3 
    ) 
); 
?>
