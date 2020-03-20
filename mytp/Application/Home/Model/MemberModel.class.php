<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/10
 * Time: 14:27
 */
namespace Home\Model;
use Think\Model;
class MemberModel extends Model {

    protected $tableName = 'member';

    public function test(){
        echo 22222;
    }
}