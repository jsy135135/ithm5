<?php
//其他操作方法
$mem = new Memcache();
$mem->connect('192.168.127.112',11211);
//设置
var_dump($mem->set('age',18,0,0));
//查看
echo '<hr>';
var_dump($mem->get('age'));
echo '<hr>';
//删除查看
// var_dump($mem->delete('age'));
var_dump($mem->flush());
echo '<hr>';
var_dump($mem->get('age'));