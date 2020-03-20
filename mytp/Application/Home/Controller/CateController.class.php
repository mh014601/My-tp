<?php
namespace Home\Controller;
use Think\Controller;
use Think\Image;

class CateController extends EmptyController{
    public function cateList(){
        // 1.获取分类表所有数据
        $category = M('category');
        $arr = $category->select();
        $rows = gettree(preArr($arr));
        $this->assign('rows',$rows);
        $this->display();
    }
    public function cateList1(){
        // 1.获取分类表所有数据
        $category = M('category');
        //父类id,子类需要次id得到
        $id = I('get.id');
        $arr = $category->where(['pid'=>$id])->select();
        $rows = gettree(preArr($arr));
        $this->assign('rows',$rows);
        $this->display();
    }
    public function cateList2(){
        $category = M('category');
        $id = I('get.id');
        $arr = $category->where(['pid'=>$id])->select();
        $rows = gettree(preArr($arr));
        $this->assign('rows',$rows);
        $this->display();
    }
    public function goodsList(){
//        $goods = M('goods');
//        $id = I('post.id');
//        $rows = $goods->join('category ON category.id = goods.cate_id')->field('')
        $category = M('category');
        $goods = M('goods');
        $cate_id = I('get.id');
        $arr = $category->select();
        $rows = gettree(preArr($arr));
        $god = $goods->where(['cate_id'=>$cate_id])->select();
        $this->assign('god',$god);
        $this->assign('rows',$rows);
        $this->display();
    }
    public function ajaxCheck(){
        $goods = M('goods');
        $id = I('post.id');
        $cate_id = getSonIdById($id);
        $where = array();
        $where['cate_id'] = array('in',$cate_id);
        $rows = $goods->where($where)->select();
        $this->ajaxReturn($rows);
    }


}