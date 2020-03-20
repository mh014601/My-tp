<?php
namespace Home\Controller;
class XcxController extends EmptyController{
    public function index(){
    $this->display();
    }
    public function xcx_add(){
        $data['goods_name'] = I('post.goods_name');
        $data['goods_price'] = I('post.goods_price');
        $bool=M('goods_xcx')->add($data);
        if($bool){
            $da['s']=1;
        }else{
            $da['s']=2;
        }
        $this->ajaxReturn($da);
    }
    public function xcx_goods_search()
    {
        $goods_name = I('post.goods_name');
        $where['goods_name'] = ['like',"%$goods_name%"];
        $rows = M('goods')->where($where)->select();
        return $this->ajaxReturn($rows);
    }
    public function lunbo(){
        $map['lunbo'] = 1;
        $rows = M('goods')->field('id,goods_pic')->where($map)->select();
//        echo M('goods')->getLastSql();

        return $this->ajaxReturn($rows);
    }
    public function goods_list(){
        $page =I('get.page');
        $start = ($page-1)*2;
        $rows = M('goods')->limit($start,2)->select();
        return $this->ajaxReturn($rows);
    }
    public function login(){
        $where['admin_name'] = I('get.uname');
        $where['admin_pass'] = md5(md5(I('get.upass')));
        $rows = M('manager')->where($where)->find();
        return $this->ajaxReturn($rows);
    }
}