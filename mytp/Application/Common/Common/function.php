<?php
use Think\Page;
use Think\Upload;
function getSonsIdById($id)
{
    $category = M('category');
    static $arr = [];
    // 1.获取孩子的id
    $rows = $category->where(['pid'=>$id])->select();
    if ($rows) {
        // 说明还有孩子 继续查询
        foreach ($rows as $v) {
            $id = $v['id'];  // 查到的孩子的id 4   5  6
            $arr[] = $id;
            getSonsIdById($id);// 4
        }
    }
    return $arr;
}
// 获取所有的商品分类
function getAllCateList(){
    $category = M('category');
    return   $category->order('path asc')->select();
}
// 无限级分类
//$tree = array();
//    foreach ($arr as $val) {
//        if (isset($arr[$val->pid])){//如果等于0 表示顶级目录 但凡pid=0 $arr[0] 不存在走else
//            $arr[$val->pid]->son[] = &$arr[$val->id]; //非顶级分类
//        } else {
//            $tree[] = &$arr[$val->id];
//        }
//    }
//    return $tree;
function gettree($arr)
{
    $tree = array();
    foreach ($arr as $val) {
        if (isset($arr[$val['pid']])){//如果等于0 表示顶级目录 但凡pid=0 $arr[0] 不存在走else
            $arr[$val['pid']]['son'][] = &$arr[$val['id']];
        } else {
            $tree[] = &$arr[$val['id']];
        }
    }
    return $tree;
}
// 处理数组 让数组的键就是数组id
function preArr($arr){
    $temp = [];
    foreach ($arr as $k=>$v){
        //让数组中值里的id=键值
        $temp[$v['id']] = $v;// $temp_arr[1] = ['id'=>1,'cate_name'=>'服装','pid'=>0,'path'=>'1']
    }
    return $temp;
}
function upload(){
    $upload = new Upload();
    $upload->saveName = 'time';
    $upload->maxSize   =     2048000 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =      './Public/Admin/upload/'; // 设置附件上传目录
    $info   =   $upload->uploadOne($_FILES['goods_pic']);
//    dump($info);
    if(!$info) {// 上传错误提示错误信息
        $this->error($upload->getError());
    }else{// 上传成功 获取上传文件信息
        echo $info['savepath'].$info['savename'];
    }

}
//function curl($url,$params=false,$ispost=0){
//    $httpInfo = array();
//    $ch = curl_init();
//
//    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
//    curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36' );
//    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
//    curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
//    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
//    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//    if( $ispost )
//    {
//        curl_setopt( $ch , CURLOPT_POST , true );
//        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
//        curl_setopt( $ch , CURLOPT_URL , $url );
//    }
//    else
//    {
//        if($params){
//            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
//        }else{
//            curl_setopt( $ch , CURLOPT_URL , $url);
//        }
//    }
//    $response = curl_exec( $ch );
//    if ($response === FALSE) {
//        //echo "cURL Error: " . curl_error($ch);
//        return false;
//    }
//    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
//    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
//    curl_close( $ch );
//    return $response;
//}
function curl($url, $params = false, $ispost = 0)
{
    $httpInfo = array();
    //初始化
    $ch = curl_init();
    /*CURL_HTTP_VERSION_NONE (默认值，让 cURL 自己判断使用哪个版本)，CURL_HTTP_VERSION_1_0 (强制使用 HTTP/1.0)或CURL_HTTP_VERSION_1_1 (强制使用 HTTP/1.1)。
    */
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    // 判断php版本 如果5.6+ 则含有CURLFILE 这个类 ，如果5.6-则设置如下，为解决php不同版本的问题
    if (class_exists('\CURLFile')) {
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
    } else {
        if (defined('CURLOPT_SAFE_UPLOAD')) {
            curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
        }
    }
    //在HTTP请求中包含一个"User-Agent: "头的字符串。
    curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36' );
    //尝试连接等待的时间，以毫秒为单位。设置为0，则无限等待。 如果 libcurl 编译时使用系统标准的名称解析器（ standard system name resolver），那部分的连接仍旧使用以秒计的超时解决方案，最小超时时间还是一秒钟。
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    // 允许 cURL 函数执行的最长秒数。
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    //TRUE 将curl_exec()获取的信息以字符串返回，而不是直接输出。
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //TRUE 时将会根据服务器返回 HTTP 头中的 "Location: " 重定向。（注意：这是递归的，"Location: " 发送几次就重定向几次，除非设置了 CURLOPT_MAXREDIRS，限制最大重定向次数。）。
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    //FALSE 禁止 cURL 验证对等证书（peer's certificate）。
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //设置为 1 是检查服务器SSL证书中是否存在一个公用名(common name)。译者注：公用名(Common Name)一般来讲就是填写你将要申请SSL证书的域名 (domain)或子域名(sub domain)。 设置成 2，会检查公用名是否存在，并且是否与提供的主机名匹配。 0 为不检查名称。 在生产环境中，这个值应该是 2（默认值）。
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    //设置编码格式，为空表示支持所有格式的编码
    curl_setopt($ch, CURLOPT_ENCODING, '');
    if ($ispost) {
        // TRUE 时会发送 POST 请求，类型为：application/x-www-form-urlencoded，是 HTML 表单提交时最常见的一种。
        curl_setopt($ch, CURLOPT_POST, true);
        //全部数据使用HTTP协议中的 "POST" 操作来发送
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        //需要获取的 URL 地址，也可以在curl_init() 初始化会话的时候。
        curl_setopt($ch, CURLOPT_URL, $url);
    } else {
        if ($params) {
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    }
    $response = curl_exec($ch);
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
    curl_close($ch);
    return $response;
}

