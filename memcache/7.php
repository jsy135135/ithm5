<?php
//计数操作
$mem = new Memcache();
$mem->connect('127.0.0.1',11211);
//计算操作的key,必须提前设置的key
// $mem->set('num',0);
// var_dump($mem->increment('num',1));
var_dump($mem->decrement('num',1));
echo '<hr>';
var_dump($mem->get('num'));