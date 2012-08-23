<?php

/**
 * @author duythanh
 * @copyright 2012
 */
?>
<?php
class InstagramsController extends AppController{
    var $name="instagrams";
    var $helpers=array(
        'Html',
        'Form',
        'Ajax',);
    var $uses=array();
    function index(){
        $this->layout="default";
    }
}
?>