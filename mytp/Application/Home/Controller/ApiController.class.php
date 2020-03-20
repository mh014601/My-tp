<?php
namespace Home\Controller;
use Think\Controller;
class ApiController extends EmptyController{
    const TOKEN = 'zhengke';
    const APP_WEATHER_KEY = "aed318cb53f11fa2961caea370d53362";
    const APPID = "wxbfbd48a6fe8fe2cd";
    const APPSECRET = "acb1986f84af343964fe2ff579321b34";
    public function index(){
//                if($this->checkWechat()){
//                         echo $_GET['echostr'];
//                     }
        //如何接收经过微信服务器处理之后再次转发给公众号的数据
        //微信服务发送给微信订阅号的数据
//        　$str = $GLOBALS["HTTP_RAW_POST_DATA"];// 7-
        $postStr = file_get_contents("php://input");//php 7+
        /* file_put_contents("a.txt",$postStr);
        die;*/
        // 实现了xml->字符串 对象
        $this->postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        // 用户发送的类型
        $MsgType = $this->postObj ->MsgType;
        switch ($MsgType){
            // 事件
            case 'event':
                $Event = $this->postObj->Event;
                $this->sendEvent($Event);
            // 文本消息
            case 'text':
                $Content = $this->postObj->Content;
                // 查询天气
                $arr =  $this->selectWeather($Content);
                $Content = $arr;
                $this->sendText($Content);
        }
    }
    // 事件操作
    public function sendEvent($Event){
        switch ($Event){
            // 订阅 关注
            case 'subscribe':
//                $Info =$this->bindNotice();
//                $this->sendText($Info);
                $this->sendText('欢迎关注!');
                $this->bindNotice();
                break;
            // 取消订阅 取消关注
            case 'unsubscribe':
                break;
            case "CLICK";
            //点击了菜单
                $this->sendClick();
                break;
        }
    }
    public function sendClick(){
        $EventKey = $this->postObj->EventKey;
        switch ($EventKey){
            case 'joke':
                break;
            case 'girl':
                $this->sendImg();
                break;
            case 'video':
                $this->sendVideo();
                break;
            case 'news':
                $this->sendNews();
                break;
        }
    }
    //数据库返回mdiaid
//    public function returnMdiaId(){
//        return $mediaId = $this->returnMdiaId();
//    }
    //回复图片
    public function sendImg(){
//        $mediaId = $this->returnMdiaId();
        $str = "<xml>
  <ToUserName><![CDATA[%s]]></ToUserName>
  <FromUserName><![CDATA[%s]]></FromUserName>
  <CreateTime>%s</CreateTime>
  <MsgType><![CDATA[%s]]></MsgType>
  <Image>
    <MediaId><![CDATA[%s]]></MediaId>
   </Image>
  </xml>";
        // 公众号
        $ToUserName = $this->postObj->ToUserName;
        // 用户
        $FromUserName = $this->postObj->FromUserName;
        // 用户发送的内容
        // 公众号回复给用户的时间
        $CreateTime = time();
        $media_id = "hyTM6eRffvhfSyLhdza0_mfsxaCD5rD0PJxShEQKksfAsxtN_Vv9Fb0GF1iSJBNr";
        // printf 格式化输出
         printf($str,$FromUserName,$ToUserName,$CreateTime,'image',$media_id);
    }
    public function sendVideo(){
        $str = "<xml>
  <ToUserName><![CDATA[%s]]></ToUserName>
  <FromUserName><![CDATA[%s]]></FromUserName>
  <CreateTime>%s</CreateTime>
  <MsgType><![CDATA[%s]]></MsgType>
  <Video>
    <MediaId><![CDATA[%s]]></MediaId>
    <Title><![CDATA[%s]]></Title>
    <Description><![CDATA[%s]]></Description>
  </Video>
</xml>";
        $ToUserName = $this->postObj->ToUserName;
        // 用户
        $FromUserName = $this->postObj->FromUserName;
        // 用户发送的内容
        // 公众号回复给用户的时间
        $CreateTime = time();
        $media_id = "pHsQUpRo23ELcYp7-RzqGlYzeuAEv4EVbSepIfMIxjtcq-50NPZb3kTon4UnkgGs";
        $Title = "不看后悔，马上删除。。。";
        $Description = "美女啊。。。。。速来围观。。。。";
        // printf 格式化输出
        printf($str,$FromUserName,$ToUserName,$CreateTime,'video',$media_id,$Title,$Description);
    }
    //发送图文
    public function sendNews(){
        $str = "<xml>
  <ToUserName><![CDATA[%s]]></ToUserName>
  <FromUserName><![CDATA[%s]]></FromUserName>
  <CreateTime>%s</CreateTime>
  <MsgType><![CDATA[%s]]></MsgType>
  <ArticleCount>%s</ArticleCount>
  <Articles>
    <item>
      <Title><![CDATA[%s]]></Title>
      <Description><![CDATA[%s]]></Description>
      <PicUrl><![CDATA[%s]]></PicUrl>
      <Url><![CDATA[%s]]></Url>
    </item>
      <item>
      <Title><![CDATA[%s]]></Title>
      <Description><![CDATA[%s]]></Description>
      <PicUrl><![CDATA[%s]]></PicUrl>
      <Url><![CDATA[%s]]></Url>
    </item>
  </Articles>
</xml>";
        $ToUserName = $this->postObj->ToUserName;
        // 用户
        $FromUserName = $this->postObj->FromUserName;
        // 用户发送的内容
        // 公众号回复给用户的时间
        $CreateTime = time();
        $count = 2;
        // printf 格式化输出
        $t1 = "CCTV第一次提到了汉服断代的原因！";
        $d1 = "CCTV法制频道
第一次提到了汉服断代的原因
历史告诉我们的
是正视它 而不是回避
大国之殇：汉服断代简史";
        $pic1= "http://www.phpmaster.cn/usr/uploads/2019/11/2408243032.jpg";
        $url1="http://www.phpmaster.cn/index.php/archives/59/";
        $t2 = "胡汉中国的定型期——清帝国(作为汉人,你不可不知)";
        $d2 = "中国人有中国人的形象，即便是元帝国，占领全中国，让南人为第四等";
        $pic2= "http://www.phpmaster.cn/usr/uploads/2019/10/3343280148.jpg";
        $url2="http://www.phpmaster.cn/index.php/archives/37/";
        printf($str,$FromUserName,$ToUserName,$CreateTime,'news',$count,$t1,$d1,$pic1,$url1,$t2,$d2,$pic2,$url2);
    }
    // 发送文本
    public function sendText($content){
        // 被动回复给用户消息
        $str = "<xml>
  <ToUserName><![CDATA[%s]]></ToUserName>
  <FromUserName><![CDATA[%s]]></FromUserName>
  <CreateTime>%s</CreateTime>
  <MsgType><![CDATA[%s]]></MsgType>
  <Content><![CDATA[%s]]></Content>
</xml>";
        // 公众号
        $ToUserName = $this->postObj->ToUserName;
        // 用户
        $FromUserName = $this->postObj->FromUserName;
        // 用户发送的内容
        // 公众号回复给用户的时间
        $CreateTime = time();
        // printf 格式化输出
        echo printf($str,$FromUserName,$ToUserName,$CreateTime,'text',$content);
    }
    private function checkWechat(){
        //1.接收 由微信服务器转出的参数
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        // 2.将接收的三个值放入数组
        $tmpArr = [self::TOKEN,$timestamp,$nonce];
        // 3.进行字典排序 从小到大 1.2.3. a.b.c
        sort($tmpArr,SORT_STRING);
        // 4.合并成一个字符串
        $tmpArr = implode($tmpArr);
        // 5.sha1加密
        $tmpStr = sha1($tmpArr);
        // 6.加密之后的结果 同 微信传递过来的 signature 比对
        if($tmpStr == $signature){
            return true;
        }else{
            return false;
        }
    }
    public  function getMess(){
      $arr =  $this->selectWeather('郑州');
        $Content = implode("\n",$arr);
      var_dump($Content);
    }
    private function isRealCity($Content){
        // 1.查询城市是否存在
        $url = "http://apis.juhe.cn/simpleWeather/cityList?key=".self::APP_WEATHER_KEY;
        $json_city_list = curl($url);
        $city_list = json_decode($json_city_list,true);
        $flag = false;
        foreach ($city_list['result'] as $v){
            if($v['district'] == $Content){
                $flag = true;
            }
        }
        return $flag;
    }
    // 查询天气
    private function selectWeather($Content){
        if(!$this->isRealCity($Content)){
            $msg =  "城市不存在。。。";
        }else{
//************1.根据城市查询天气************
            $url = "http://op.juhe.cn/onebox/weather/query";
            $params = array(
                "cityname" => "$Content",//要查询的城市，如：温州、上海、北京
                "key" => self::APP_WEATHER_KEY,//应用APPKEY(应用详细页查询)
                "dtype" => "json",//返回数据的格式,xml或json，默认json
            );
            $paramstring = http_build_query($params);
            $content = curl($url,$paramstring);
            $result = json_decode($content,true);
            if($result){
                if($result['error_code']=='0'){
                    print_r($result);
                    $msg = "";
                    $info = $result['result']['data']['realtime'];
                    $msg.="今天是:".$info['date']."您查询的城市为:".$info['city_name'].",当前温度".$info['weather']['temperature']."度";

                }else{
                    $msg  =$result['error_code'].":".$result['reason'];
                }
            }else{
                $msg =  "请求失败";
            }
        }
        return $msg;
    }
    // 获取access_token
    private function getAccessToken(){
        $arr = M('token')->find(1);
        if(time()>$arr['expire_time']){
            // 过期了
            $access_token = $this->createAccessToken();
        }else{
            $access_token = $arr['access_token'];
        }
        return $access_token;
    }
    // 生成access_token
    private function createAccessToken(){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".self::APPID."&secret=".self::APPSECRET;
        $json_str = curl($url);
        $arr = json_decode($json_str,true);
        $access_token = $arr['access_token'];
        // 更新数据库
        M('token')->where(['id'=>1])->save(['access_token'=>$access_token,'expire_time'=>time()+7000]);
        return $access_token;
    }
    // 用户绑定 用户关注公众号后添加记录
    public function bindNotice(){
        $access_token = $this->getAccessToken();
        // 用户
        $FromUserName = $this->postObj->FromUserName;

        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid="."$FromUserName"."&lang=zh_CN";
        $json_str = curl($url);
        $userInfo = json_decode($json_str,true);
        file_put_contents("userinfo.txt",$json_str);
        // 用户信息存储数据表

    }
    public function createMenu(){
         $access_token = $this->getAccessToken();
         $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
        $menu['button'][0]['name'] = '汉服';

        $menu['button'][0]['sub_button'][0]= ['name'=>'看美女','type'=>'click','key'=>'girl'];
        $menu['button'][0]['sub_button'][1]= ['name'=>'看视频','type'=>'click','key'=>'video'];
        $menu['button'][0]['sub_button'][2]= ['name'=>'博客','type'=>'view','url'=>'http://www.phpmaster.cn'];
        $menu['button'][0]['sub_button'][3]= ['name'=>'扫一扫','type'=>'scancode_push','key'=>'saoyisao'];
        $menu['button'][0]['sub_button'][4]= ['name'=>'拍照','type'=>'pic_sysphoto','key'=>'photo'];

        $menu['button'][1]['name'] = '回复图文';
        $menu['button'][1]['type'] = 'click';
        $menu['button'][1]['key'] = 'news';
        //中文编码问题
        $json = json_encode($menu,JSON_UNESCAPED_UNICODE);
        $bool = curl($url,$json,1);
                var_dump($bool);
    }
    public function upImage(){
        // 上传图片成功后，数据库存两个字段，一个相对路径，一个绝对路径 dirname(__FILE__)
        // 调用接口 传递绝对路径
        $this->getMediaId($path);
    }
    public function getMediaId($path){
        //
        $access_token = $this->getAccessToken();
        $url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token=".$access_token."&type=image";

        // 1. @拼上图片的绝对路径 2 .windows 反斜杠 linux 斜杠
//        $filepath = dirname(__FILE__)."\dongman.jpg";
        $filepath = $path;
        $data = ['media'=>"@".$filepath];

        $r = curl($url,$data,1);
        $arr = json_decode($r,true);
        // json->数组 获取media_id
        // 写数据库
        $this->insertMediaId($arr['media_id']);
    }
    public function insertMediaId($media_id){
        // 插入数据库
//        M()
    }
}