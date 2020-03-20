<?php
namespace Home\Controller;

class UserController extends EmptyController{
    public function index(){
        echo "User/index";
    }

    public function reg(){
        $this->display();
    }
}
