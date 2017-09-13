<?php
//声明字符编码信息
header('Content-type:text/html;charset=utf-8');
//缓存mysql数据操作
//1.查询memcache的数据
//连接memcache
$mem = new Memcache();
$mem->connect('127.0.0.1',11211);
$data = $mem->get('data');
//2.如果有直接返回
//如果数据不存在，memcache返回false
if($data === false){
  sleep(2);
  // echo 'this is mysqldata';
  //如果没有就查询mysql,再缓存
  //连接mysql查询数据
  $mysqli = new Mysqli('127.0.0.1','root','root','api59');
  $sql = 'select * from mobile limit 5';
  $obj = $mysqli->query($sql);
  // var_dump($obj);
  //组合成为一个二维数组
  //定义空数组
  $data = array();
  //循环
  while ($row = $obj->fetch_assoc()) {
    $data[] = $row;
  }
  // var_dump($data);
  //缓存到memcache里
  $mem->set('data',$data,0,6);
}
//3.遍历输出数据
foreach ($data as $key => $value) {
  echo '<p>'.$value['mobile'].'</p>';
}