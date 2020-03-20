<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/10
 * Time: 14:00
 */
namespace Admin\Controller;

use Think\Controller;

class EmptyController extends Controller{

    public function _empty(){
        $this->display('Public/404');
    }
    public function __construct()
    {
        parent::__construct();
        $url = CONTROLLER_NAME.'/'.ACTION_NAME;

        $deny_list = ['Index/login','Index/loginAction'];
        if(!in_array($url,$deny_list)){
            if(!session('uname')){
                redirect(U('Index/login'));
            }
        }


    }
}