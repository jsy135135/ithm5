<?php
//添加数据
//连接mongodb
//实列化
$mongo = new MongoClient("mongodb://192.168.127.99");
//连接数据库
$database = $mongo->ithm5;
//连接集合
$con = $database->student;
//写入数据
// db.student.insert({name:'xiaoming',age:16,msg:'我喜欢打篮球'})
// {} 转为array  :转为 =>
$rs = $con->insert(array('name' => 'xiaoming','age' => 16,'msg' => '我喜欢打篮球'));
var_dump($rs);