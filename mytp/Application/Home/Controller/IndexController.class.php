<?php
namespace Home\Controller;

use Think\Verify;

class IndexController extends EmptyController
{
    public function mh(){
        $this->display();
    }
  public function index(){
      $user = M('user');
      $id = session('id');
      $row = $user->where(['id'=>$id])->find();
      $this->assign('row',$row);
      $this->display();
  }
    public function indexAction(){

    }
    public function reg(){
        $this->display();
    }

    public function regAction(){
        $user = M('user');
        $where['username'] = I('post.uname');
        $where['phone'] = I('post.phone');
        $where['_logic'] = 'OR';
        $row = $user->where($where)->find();
        if (!$row){
            $data['username'] = I('post.uname');
            $data['phone'] = I('post.phone');
            $data['password'] = md5(md5(I('post.upass')));
            $data['flag'] = md5(md5($data['username'].$data['password']));
            $user->add($data);
            redirect('login');
        }else{
            redirect('reg');
        }
  }
  public function login(){
      $id = I('get.id');
      $url = I('get.url');
      $this->assign('id',$id);
      $this->assign('url',$url);
      $this->display();
    }
    public function loginAction(){
        if (I('get.url')){
            //存session
          $goods = M('goods');
          $url = I('get.url');
          $gid = I('get.id');
          $row = $goods->where(['id'=>$gid])->find();
          if($row){
              $user = M('user');
              $info = I('post.info');
              $rows = $user->where(['username'=>$info])->find();
              $id = $rows['id'];
              session('id',$id);
          }
          $this->redirect($url,$row);
      }
        $user = M('user');
        $info = I('post.info');
        $upass = md5(md5(I('post.upass')));
        $hid = I('post.hid');
        if ($hid == 'phone'){
            $row = $user->where(['phone'=>$info])->find();
            if ($row){
                if ($row['password'] == $upass){
                    $id = $row['id'];
                    session('id',$id);
                    redirect('index');
                }
            }
            redirect('login');
        }
        else{
            $row = $user->where(['username'=>$info])->find();
            if ($row){
                if ($row['password'] == $upass){
                    $id = $row['id'];
                    session('id',$id);
                    redirect('index');
                }
            }
            redirect('login');
        }
  }
  public function ajaxLogin(){
        $user = M('user');
        $info = I('post.info');
        $ss = I('post.ss');
        if ($ss == 'phone'){
            $row = $user->where(['phone'=>$info])->find();
            if (!$row){
                $data['status'] = 1;
            }else{
                $data['status'] = 2;
            }
        }else{
            $row = $user->where(['uname'=>$info])->find();
            if (!$row){
                $data['status'] = 3;
            }else{
                $data['status'] = 4;
            }
        }
        $this->ajaxReturn($data);
    }

    public function ajaxVerify(){
        $verify = I('post.verify');
        $bool = $this->check_verify($verify,1);
        if ($bool){
            $data['status'] = 1;
        }else{
            $data['status'] = 2;
        }
        $this->ajaxReturn($data);
    }

    public function verify(){
        $config = array(
            'imageW' =>  100,
            'imageH' =>  30,
            'fontSize' => 15,
            'length' => 3,
            'useCurve' => false,
            'useNoise' => false,
        );
        $verify = new Verify($config);
        $verify->entry(1);
    }

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
}