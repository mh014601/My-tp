<?php

namespace Home\Controller;
//foreach ($pid as $v) {
//    $pname =  DB::table('goods')->where('id',$v)->value('good_name');
//    $price =  DB::table('goods')->where('id',$v)->value('new_price');
//    $pic =  DB::table('goods')->where('id',$v)->value('pic');
//    $cid = DB::table('cart')->where('uid', $uid)->where('product_id', $v)->get();
//    $bool =  DB::table('order')->insertGetId([
//        'uid'=>$uid,
//        'pid'=>$v,
//        'taste'=>$cid[0]->product_taste,
//        'pack'=>$cid[0]->product_pack,
//        'pnum'=>$cid[0]->product_num,
//        'status'=>'0',
//        'order_id'=>$date1,
//        'time'=>$date2,
//        'pname'=>$pname,
//        'price'=>$price,
//        'pic'=>$pic
//    ]);
//    if ($bool && $cid[0]->id){
//        DB::table('cart')->where('id',$cid[0]->id)->delete();
//        $data['status'] = 1;
//        $data['order_id'] = $date1;
//    }
//}
class OrderController extends EmptyController{
    public function order()
    {
        $num = I('post.num1');
        $goods = M('goods');
        $order = M('order');
        $gid = I('post.gid');
        $uid = session('id');
        $arr_gid[] = null;
        foreach ($gid as $v) {
            //插入数据库订单表里
            //$arr_gid[$v] = $goods->where(['id' =>$v])->find();
//            $rows = $goods->where(['id' =>$v])->field('goods_name')->find();
//            $arr_gid[$v] = $rows;
    $pname = $goods->where(['id'=>$v])->getField('goods_name');
    //    $price =  DB::table('goods')->where('id',$v)->value('new_price');
//    $pic =  DB::table('goods')->where('id',$v)->value('pic');
//    $cid = DB::table('cart')->where('uid', $uid)->where('product_id', $v)->get();
        }
        dump($pname);
        die();
        $data['$arr_gid']=$arr_gid;
//        $row = $
        dump($data);
        die();
        $this->ajaxReturn($data);
    }

}
