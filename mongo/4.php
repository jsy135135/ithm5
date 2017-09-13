<?php
//删除数据
//实例化操作
$mongo = new MongoClient("mongodb://root:root@192.168.127.99:27017/admin");
//连接库
//连接集合
$rs = $mongo->ithm5->student->remove(['name' => 'xiaoming']);
var_dump($rs);