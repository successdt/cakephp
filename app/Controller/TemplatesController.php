<?php
class TemplatesController extends AppController
{
    //var $layout = "template";
    var $helper = array("Html", "Common");
    function index()
    {
        $this->layout="instagram";
        $this->set('title_for_layout', 'Template by DuyThanh');
        $this->set("content", "Duy Thành");
    }
    function view()
    {
        $this->set('title_for_layout', 'Template by DuyThanh');
        $this->set("content", "Duy Thành");
    }
}
?>