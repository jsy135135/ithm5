<?php
//简单操作memcache
//实列化
$mem = new Memcache();
//连接
$mem->connect('192.168.127.112',11211);
//存储数据
//set(key,value,是否压缩,过期时间)
//0为不压缩,0为不过期
$rs = $mem->set('classname','ithm5',0,0);
var_dump($rs);
echo '<hr>';
//获取数据
$data = $mem->get('classname');
var_dump($data);
