<?php
//标量类型的存储
$mem = new Memcache();
$mem->connect('192.168.127.112',11211);
//设置数据
//string
$rs1 = $mem->set('string','string',0,0);
//int
$rs2 = $mem->set('int',5,0,0);
//float
$rs3 = $mem->set('float',183.3,0,0);
//bool
$rs4 = $mem->set('bool',true,0,0);
var_dump($rs1);
echo '<hr>';
var_dump($rs2);
echo '<hr>';
var_dump($rs3);
echo '<hr>';
var_dump($rs4);
echo '<hr>';
//获取数据
//string
$data1 = $mem->get('string');
//int
$data2 = $mem->get('int');
//float
$data3 = $mem->get('float');
//bool
$data4 = $mem->get('bool');
var_dump($data1);
echo '<hr>';
var_dump($data2);
echo '<hr>';
var_dump($data3);
echo '<hr>';
var_dump($data4);
echo '<hr>';