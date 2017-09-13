<?php
//多个memcache使用
$mem = new Memcache();
//memcache连接池
$mem->addServer('127.0.0.1',11211);
// $mem->addServer('192.168.127.112',11211);
//添加数据
// var_dump($mem->set('num1',1));
// var_dump($mem->set('num2',2));
// var_dump($mem->set('num3',3));
// var_dump($mem->set('num4',4));
//获取数据
var_dump($mem->get('num1'));
var_dump($mem->get('num2'));
var_dump($mem->get('num3'));
var_dump($mem->get('num4'));