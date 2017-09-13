<?php
//特殊类型存储
$mem = new Memcache();
$mem->connect('192.168.127.112',11211);
//资源类型
$resource = mysql_connect('127.0.0.1','root','root');
// var_dump($resource);
//NULL
$null = NULL;
//存储数据
$rs1 = $mem->set('resource',$resource,0,0);
$rs2 = $mem->set('null',$null,0,0);
var_dump($rs1);
echo '<hr>';
var_dump($rs2);
echo '<hr>';
//获取数据
$data1 = $mem->get('resource');
$data2 = $mem->get('null');
var_dump($data1);
echo '<hr>';
var_dump($data2);