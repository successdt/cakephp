<?php

/**
 * @author duythanh
 * @copyright 2012
 */
class CommentsController extends AppController
{
    var $name = 'Comments';
    var $helper = array(
        "Html",
        "Common",
        "Form");
    var $components=array("Cookie");
    var $layout = 'blog_template';
    function save()
    {
        //debug($this->data);
        $data = $this->data;
        if($data['comment']){
            $this->Comment->save($this->data); //Lưu dữ liệu
            //Gửi mail thông báo
            App::uses('CakeEmail', 'Network/Email');
            $email = new CakeEmail("smtp");
            $email->from(array('success.ddt@gmail.com' => 'myBlog'));
            $to = $data['email'];
            $msgtitle = 'From myBlog';
            $content = "
                Xin chào bạn " . $data['author'] . "!
                myBlog cảm ơn bạn vì đã comment:
                <hr>
                " . $data['comment'] . "
                <hr>
                tại ".$data['link']." ".$data['title']."
                Rất hân hạnh khi bạn ghé thăm chúng tôi !";
            $email->to($to);
            $email->subject($msgtitle);
            $email->emailFormat('html');
            $email->template('default');
            $ok = $email->send($content);
            if($data['fb-option']){
                $this->set('data',$this->data);
                $this->render('save');
                $this->redirect(array(
                    'action' => 'view',
                    'controller' => 'blogs',
                    $data['posts_id']));
            }else{
                $this->redirect(array(
                    'action' => 'view',
                    'controller' => 'blogs',
                    $data['posts_id']));
        }
        }else{
                $this->redirect(array(
                    'action' => 'view',
                    'controller' => 'blogs',
                    $data['posts_id']));
        }


    }
    function fbshare(){
        $this->layout='';
        $data=$this->data;
        //debug($data);
        $this->set('links',$data['link']);
        $this->set('comment',$data['comment']);
        $this->set('post_id',$data['post_id']);
        //debug($data);
    }

}


?>