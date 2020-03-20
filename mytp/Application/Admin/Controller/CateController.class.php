<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Image;

class CateController extends EmptyController{
    public function cateList(){
        $category = M('category');
        $rows = $category->order('path asc')->select();
//        dump($rows);
        $this->assign('rows',$rows);
        $this->display();
    }
    public function cateDel(){
        $category = M('category');
        $goods = M('goods');
        $id = I('id');
        //根据自己的id查是否还有孩子
        $arr = getSonsIdById($id);
        //没有
        if (!$arr){
            //再去查要删除的父类还有除自己之外的商品
            $row = $goods->where(['cate_id'=>$id])->find();
            //只有自己删除
            if (!$row){
                $category->where(['id'=>$id])->delete();
                $data['status'] = 1;
            }//还有除自己之外的商品
            else{
                $data['status'] = 2;
            }
        }//有
        else{
            $data['status'] = 3;
        }
       $this->ajaxReturn($data);

    }
    public function cateAdd(){
        $category = M('category');
        $rows = $category->order('path asc')->select();
        $this->assign('rows',$rows);
        $this->display();
    }
    public function cateAddAction(){
        $category = M('category');
        // 模板中的name=id 值是父类中的id值,因为还没执行插入
        $id = I('post.id');
        $cate_name = I('post.cate_name');
        $where['cate_name'] = $cate_name;
        // 无论根分类还是子分类，但凡查询的分类已经存在，就别想插入了。。。
        $rows = $category->where($where)->find();
        if($rows){
            //此分类已存在
            redirect('cateAdd');
        }else{
            //不是根分类
            if($id>0){
                $pid = $id;
                //1.通过父id查询到父类的path
                $path = $category->where(['id'=>$id])->getField('path');
               $where['pid']=$pid;
                // 2.插入成功后获取插入的id
               $id = $category->add($where);
                // 3.当前的path = 父类的path + “,自己的id“
               $path = $path.",$id";
            }else{
                //插入根分类 $id为0
                $pid = $id;
                $where['pid'] = $pid;
                //add()增加 成功后返回值为此id
                $id =$path =$category->add($where);
            }
           $category->where(['id'=>$id])->save(['path'=>$path]);
            redirect('cateList');
        }
    }

    public function orderList(){
            $order = M('order');
            $rows = $order->join('user ON order.uid = user.uid')
                ->join('goods ON goods.id = order.pid')
                ->join('add_address ON add_address.id = order.add_id')
                ->field("order.id, order.order_id, user.name, goods.goods_name, order.pnum, add_address.address, order.status, order.pay_type, order.express_type, order.time")->select();;
                $this->assign('rows',$rows);
                $this->display();;

    }
}