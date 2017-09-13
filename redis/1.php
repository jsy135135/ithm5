<?php
//实列化
$redis = new Redis();
//连接
$redis->connect('192.168.127.78',6379);
//授权
$redis->auth('ithm5');
//设置
var_dump($redis->set('time',time()));
echo '<hr>';
var_dump($redis->get('time'));
