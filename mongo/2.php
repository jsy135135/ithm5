<?php
//header
header('Content-type:text/html;charset=utf-8');
//查询数据
//实列化
$mongo = new MongoClient("mongodb://192.168.127.99");
//连接数据库
$database = $mongo->ithm5;
//连接集合
$con = $database->student;
//查询数据
$result = $con->find(array(),array('_id' => 0));
// var_dump($result);
// 遍历对象
foreach ($result as $key => $value) {
  // var_dump($key);
  // var_dump($value);
  foreach ($value as $k => $v) {
    echo $v.'<br />';
  }
}