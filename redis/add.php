<?php
//实列化
$redis = new Redis();
//连接
$redis->connect('192.168.127.78',6379);
//授权
$redis->auth('ithm5');
//添加商品数量
for ($i=1; $i < 21; $i++) {
  $redis->lpush('shopList',$i);
}
echo 'end';
