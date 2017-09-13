<meta charset="utf-8">
<?php
//获取用户的ip
$ip = $_SERVER['REMOTE_ADDR'];
// echo $ip;die();
//实列化
$redis = new Redis();
//连接
$redis->connect('192.168.127.78',6379);
//授权a
$redis->auth('ithm5');
//判断此ip是否已经抢购过
if($redis->sIsMember('ipSet',$ip) === false){
  //抢购商品
  $status = $redis->rPop('shopList');
  if($status === false){
    //抢购失败返回的false
    echo '已经抢购结束,请下次再来！';
  }else{
    //抢购成功就是商品id
    echo '您是第'.$status.'位抢到的用户';
    //抢购成功把ip地址记录到set中
    $redis->sAdd('ipSet',$ip);
  }
}else{
  //已经抢购过的ip
  echo '不要再来了，给别人留点吧!';
}



