<?php
namespace Home\Controller;

class GoodsController extends EmptyController{
    public function goodsDetail(){
        //回到当前的路由
        $url = CONTROLLER_NAME.'/'.ACTION_NAME;
        $id = I('get.id');
        $goods = M('goods');
        $row = $goods->where(['id'=>$id])->find();
        $this->assign('row',$row);
        $this->assign('url',$url);
        $this->display();
    }
    public function ajaxAddCart(){
        $cart = M('cart');
        $uid = session('id');
        $gid = I('post.id');
        $num = I('post.num');
        if($uid == ''){
            $data['status'] = 2;
            $this->ajaxReturn($data);
        }
        // 存购物车 之前需要查询 此商品是否已经存在
        $row = $cart->where(['gid'=>$gid,'uid'=>$uid])->find();
        if($row){
            $new_num = $row['num']+$num;
            $bool = $cart->where(['id'=>$row['id']])->save(['num'=>$new_num]);
        }else{
//            $data = compact('uid','gid','num');
            $where['gid'] = $gid;
            $where['uid'] = $uid;
            $where['num'] = $num;
            $bool = $cart->add($where);
        }
        if($bool){
            $data['status'] = 0;
        }else{
            $data['status'] = 1;
        }
        $this->ajaxReturn($data);
    }
    public function cart(){
        $cart = M('cart');
        $uid = session('id');
        if($uid==''){
        $this->redirect('Home/Index/login');
        }
        $cartList = $cart->Join('goods ON cart.gid = goods.id')->
        field("cart.num,cart.uid,cart.gid,goods.goods_name,goods.goods_price,goods.goods_pic,goods.goods_detail,goods.goods_num")
            ->where(['uid'=>$uid])->select();
        $this->assign('uid',$uid);
        $this->assign('cartList',$cartList);
        $this->display();
    }
}