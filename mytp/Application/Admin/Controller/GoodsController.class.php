<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Image;
use Think\Upload;

class GoodsController extends EmptyController
{
    public function index()
    {
        $picname = './Public/meinv.jpg';
        $img = new Image(1, $picname);

//       $img->open($picname);
        $width = $img->width(); // 返回图片的宽度
        $height = $img->height(); // 返回图片的高度
//        $type = $img->type(); // 返回图片的类型
//        $mime = $img->mime(); // 返回图片的mime类型
//        $size = $img->size(); // 返回图片的尺寸数组 0 图片宽度 1 图片高度
//
//        echo $width,$height,$type,$mime;
//        dump($size);
        $newname = 'crop.jpg';
        // 裁剪
//        $img->crop($width/2,$height/2,200)->save($newname);
        // 缩略图
//        $img->thumb(200,200,3)->save('./thumb.jpg');
        // 图片水印
//        $img->water('water.png',5,10)->save('new_water.jpg');
        // 文字水印
        $img->text('小姐姐', './msyh.ttf', 50, '#00ff00', 5)->save('new_text.jpg');

    }
    public function goodsList()
    {
        $cateList = getAllCateList();
        $goods = M('goods');
//        $category = M('category');
        $rows = $goods->join('category ON category.id = goods.cate_id')
            ->field("goods.id as gid,goods_name,goods_price,goods_detail,goods_pic,category.cate_name,goods.add_time")
            ->order('add_time desc')->select();
        $this->assign('rows', $rows);
        $this->assign('cateList', $cateList);
        $this->display();
    }
    public function goodsEdit()
    {
        $rows = getAllCateList();
        $gid = I('get.gid');
        $goods = M('goods');
        $row = $goods->where(['id' => $gid])->find();
        $this->assign('gid', $gid);
        $this->assign('row', $row);
        $this->assign('rows', $rows);
        $this->display();
    }
    public function goodsEditAction()
    {
        $goods = M('goods');
        $up = new Upload();
        $up->rootPath  =      './Public/Admin/goods/'; // 设置附件上传目录
        $info   =   $up->uploadOne($_FILES['goods_pic']);
        $pic = $info['savepath'].$info['savename'];
        ;$id = I('post.id');
//        $row = $goods->where(['id' => $id])->save($all);
        if ($id) {
            $data['goods_name'] = I('post.goods_name');
            $data['goods_price'] = I('post.goods_price');
            $data['goods_num']  = I('post.goods_num');
            $data['cate_id']  = I('post.cate_id');
            $data['goods_detail']  = I('post.goods_detail');
            $data['goods_pic'] = $pic;
            $goods->where("id = $id")->save($data);

            redirect('goodsList');
        } else {
            redirect('goodsEdit', [$id]);
        }
    }

    public function goodsAdd()
    {
        $cateList = getAllCateList();
        $this->assign('cateList', $cateList);
        $this->display();
    }

    public function goodsAddAction()
    {
        $cate_id = I('post.cate_id');
        $goods = M('goods');
        if($cate_id){
            $all = I('post.');
            unset($all['_token']);
            $all['add_time'] = time();
            $id = $goods->add($all);
            if($id){
                redirect("goodsList");
            }else{
                redirect("goodsAdd");
            }
        }
    }

    public function ajaxGoodsDel(){
        $id = I('post.id');
        $goods = M('goods');
        if($goods->where(['id'=>$id])->delete()){
            $data['status'] =1;
        }else{
            $data['status'] = 2;
        }
        $this->ajaxReturn($data);
    }


}



