<?php

/**
 * @author duythanh
 * @copyright 2012
 */
class BlogTemplatesController extends AppController
{
    var $layout="blog_template";
    var $helper=array("Html","Common");
    function index()
    {
        $this->set('title_for_layout', 'Template by DuyThanh');
        $this->set("content", "Duy Thành");
    }
    
       
}


?>