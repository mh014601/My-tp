<?php
namespace Admin\Controller;
use Think\Controller;
//use Org\Util\Page;
use Think\Image;
use Think\Page;
class ManagerController extends EmptyController {
    public function managerList(){
        // 总记录数
        $manager = M('manager');
        $count =$manager->count();
        $Page = new Page($count,2);
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('first','首页');
        $Page->setConfig('end','尾页');
        $Page->setConfig('theme','共%TOTAL_ROW% 条记录%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
//         获取搜索的关键字
        $keyword = I('post.keyword');
        $where['uname']=session('uname');
        $row = $manager->where($where)->select();

        // 首次进来 ，没有传值点击查询
        if(!$keyword){
            // 获取所有的管理员
            $rows = $manager->limit($Page->firstRow.','.$Page->listRows)->order('add_time desc')->select();
        }else{
            // 输入了关键字进行查询
            $rows = $manager->where('uname','like',"%$keyword%")->order('add_time desc')->select;
        }
        $this->assign('row',$row);
        $this->assign('rows',$rows);
        $this->assign('keyword',$keyword);
        $this->assign('page',$Page);
        $this->display();
    }
    public function managerEdit(){
        $id = I('get.id');
        $manager = M('manager');
        $where['id']=$id;
        $row=$manager->where($where)->find();
//        dump($row);
        $this->assign('row',$row);
        $this->display();
    }
    public function managerEditAction(){
        $status = I('post.status');
        $admin_name = I('post.admin_name');
        $id = I('post.id');
        $manager = M('manager');
        $where['status']=$status;
       $where['admin_name']=$admin_name;
        $bool=$manager->where(['id'=>$id])->save($where);

        if($bool){
           redirect('managerList');
        }else{

            redirect('managerEdit');
        }
    }
    public function managerDel(){
        $manager = M('manager');
        $id = I('post.id');
        $where['id']=$id;
        $row=$manager->where($where)->delete();
        if($row){
            $data['status']=1;
        }else{
            $data['status']=2;
        }
         $this->ajaxReturn($data);

    }
    public function managerAdd(){
        $this->display();
    }
    public function managerAddAction(){
        if(I('post.switch')){
            $status = 1;
        }else{
            $status = 2;
        }
        $add_time = date("Y-m-d H:i:s",time());
        $admin_name = I('post.admin_name');
        $admin_pass = md5(md5(I('post.admin_pass')));
        $manager = M('manager');
        $where['status']=$status;

        $where['add_time']=$add_time;
        $where['admin_name']=$admin_name;
        $where['admin_pass']=$admin_pass;
        $row=$manager->add($where);
        if($row){
        redirect('managerList');
        }else{
            redirect('managerAdd');
        }
    }
    public function ajax_checkName(){
        $admin_name = I('post.admin_name');
        $manager = M('manager');
        $where['admin_name']=$admin_name;
        $row = $manager->where($where)->find();
        if($row){
            $data['status']=1;
        }else{
            $data['status']=2;
        }
        $this->ajaxReturn($data);
    }

}
