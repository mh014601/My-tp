<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/10
 * Time: 14:00
 */
namespace Home\Controller;

use Think\Controller;

class EmptyController extends Controller{

    public function _empty(){
        $this->display('Public/404');
    }

}