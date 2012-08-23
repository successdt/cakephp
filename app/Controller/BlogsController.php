<?php

/**
 * @author duythanh
 * @copyright 2012
 */
class BlogsController extends AppController
{

    var $name = "Blogs";
    var $helpers = array(
        "Html",
        "Form",
        "Common",
        'Ajax',
        'Javascript',
        "Paginator");
    var $components = array('Email');
    var $layout = "blog_template";
    var $_sessionUsername = "Username";
    var $paginate = array('limit' => 10, 'order' => array('Blog.created' => 'asc'));
    function index()
    {

        $this->paginate = array(
            'limit' => 10,
            'order' => array('Blog.created' => 'asc'),
            'joins' => array(array(
                    'table' => 'categories',
                    'alias' => 'Cat',
                    'type' => 'LEFT',
                    'conditions' => array('Cat.id = Blog.category_id', ))),
            'fields' => array(
                'Blog.id',
                'Blog.title',
                'Blog.description',
                'Blog.pubDate',
                'Cat.name'));
        //$this->set('posts', $this->Blog->find('all', $options));
        $this->Blog->recursive = 0;
        $this->set('posts', $this->paginate());
        $this->set('title_for_layout', 'Blog');

    }
    function view($id)
    {

        if (!$id)
            $this->redirect(array('controller' => 'blogs', 'action' => 'index'));
        $this->set('posts', $this->Blog->find('all', array('conditions' => array('id' =>
                    $id))));
        $query = "select * from comments where posts_id='$id'";
        $this->set('comments', $this->Blog->query($query));
        $this->set('title_for_layout', 'Blog');

    }
    function viewcat($cat_id){
        $this->paginate = array(
            'limit' => 10,
            'order' => array('Blog.created' => 'asc'),
            'conditions'=>array(
                'Cat.id'=>$cat_id),
            'joins' => array(array(
                    'table' => 'categories',
                    'alias' => 'Cat',
                    'type' => 'LEFT',
                    'conditions' => array('Cat.id = Blog.category_id', ))),
            'fields' => array(
                'Blog.id',
                'Blog.title',
                'Blog.description',
                'Blog.pubDate',
                'Cat.name'));
        //$this->set('posts', $this->Blog->find('all', $options));
        $this->Blog->recursive = 0;
        $this->set('posts', $this->paginate());
        $this->set('title_for_layout', 'Blog');
    }
    function newpost()
    {
        if (!$this->Session->read($this->_sessionUsername))
            // đọc Session xem có tồn tại không

            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        else {

            $this->set('author', $this->Session->read($this->_sessionUsername));
            $this->render('newpost');
        }

    }
    function save()
    {
        $this->Blog->save($this->data);
        $this->redirect(array('controller' => 'blogs', 'action' => 'index'));
                
    }
    function singleview()
    {
        $this->layout = '';
        $this->set('items', $this->Blog->find('all', array('order' => 'rand()', 'limit' =>
                '1')));
    }

}


?>