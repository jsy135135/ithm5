<?php
//过期时间设置
$mem = new Memcache();
$mem->connect('127.0.0.1',11211);
//设置8秒之后过期
//时间差设置方式
// var_dump($mem->set('name','itcast',0,8));
// 时间戳设置方式
var_dump($mem->set('name','itcast',0,time()+8));
echo '<hr>';
var_dump($mem->get('name'));
