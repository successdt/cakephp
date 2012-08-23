<?php 
class UsersController extends AppController{ 
    var $layout = false; // Không sử dụng Layout mặc định của CakePHP , dùng file CSS riêng 
    var $name = "Users"; 
    var $helpers = array("Html"); 
    var $component = array("Session");      
    var $_sessionUsername  = "Username"; // tên Session được qui định trước 
     
     
    //---------- View 
    function view(){ 
        if(!$this->Session->read($this->_sessionUsername)) // đọc Session xem có tồn tại không 
            $this->redirect("login"); 
        else 
            $this->redirect(array('controller'=>'blogs','action'=>'index')); 
    } 
     
    //--------- Login 
    function login(){ 
      $error="";// thong bao loi 
        if($this->Session->read($this->_sessionUsername)) 
            $this->redirect(array('controller'=>'blogs','action'=>'index')); 

        if(isset($_POST['ok'])){ 
           $username = $_POST['username']; 
           $password = sha1($_POST['password']);  
           if($this->User->checkLogin($username,$password)){ 
                $this->Session->write($this->_sessionUsername,$username); 
                $this->redirect(array('controller'=>'blogs','action'=>'index')); 
            }else{ 
                $error = "Username or Password wrong"; 
           } 
        } 
        $this->set("error",$error); 
        $this->render("/Users/login"); 
    } 
    //---------- Logout 
    function logout(){ 
        $this->Session->delete($this->_sessionUsername); 
        $this->redirect("login"); 
    } 
}