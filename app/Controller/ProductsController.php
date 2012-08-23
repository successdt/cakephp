<?php
class ProductsController extends AppController
{
    var $name = 'Products';
    var $layout = "template";//dùng layout tùy chỉnh
    var $helpers = array(
        "Html",
        "Ajax",
        "Javascript",
        "Common");
    function index()
    {
        $this->set('title_for_layout', 'Adam_fashion');
        $this->set('products', $this->Product->find('all'));
    }
}
?>