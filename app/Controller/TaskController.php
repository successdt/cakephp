<?php
class TaskController extends AppController
{
    var $name = 'Tasks';
    function index()
    {
        $params=array(
        'conditions'=>array('Task.title'=>'hanu'));
        $this->set('tasks',$this->Task->find('all',$params));
    }


}
?>