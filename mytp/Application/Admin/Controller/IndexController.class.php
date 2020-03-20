<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;

class IndexController extends EmptyController {
    public function index(){
    $this->display();
    }
    public function top(){
        $this->display();
    }
    public function left(){
        $this->display();
    }
    public function main(){
        $this->display();
    }
    public function createVerify(){
        $rand = mt_rand(3,6);
        $config =    array(
            'fontSize'    =>    25,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点,

        );
        $verify = new Verify($config);

        $verify->entry();
    }
    function check_verify($code, $id = ''){

        $verify = new Verify();
        return $verify->check($code, $id);

    }
    function ajax_verify(){
        $code = I('post.verify1');
        $bool=$this->check_verify($code);
        if($bool){
            $data['status'] =1;
        }
        else{
            $data['status'] =2;
        }
        $this->ajaxReturn($data);

    }

    public function login(){
        $this->display();
    }
    public function loginOut(){
        redirect('login');
    }
    public function loginAction(){
        $member = M('member');
        $uname = I('post.uname');
        $upass = md5(md5(I('post.upass')));
        $where['uname']=$uname;
        $where['upass']=$upass;
        $rows=$member->where($where)->select();

        //如果查到
        if($rows){
        //成功存session
            session('uname',$uname);
            redirect('index');

        }
        else{
            session('uname',$uname);
            redirect('login');
       }
    }

}