<?php
//header
header('Content-type:text/html;charset=utf-8');
//修改数据
//实列化
$mongo = new MongoClient("mongodb://192.168.127.99");
//连接数据库
$database = $mongo->ithm5;
//连接集合
$con = $database->student;
//修数数据
$rs = $con->update(['name' => 'xiaoming'],['$set' => ['age' => 18]]);
var_dump($rs);
