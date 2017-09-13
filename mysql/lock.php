<?php
//error_reporting(0);
$conn = mysql_connect('127.0.0.1','root','root');
mysql_query('use ithm5');
mysql_query('set names utf8');   //latin1
// mysql_query('lock table testnum write');//添加写锁
//添加写锁文件
$fh = fopen('./lock.txt','w');
flock($fh,LOCK_EX );//添加锁
$res = mysql_query('select id from testnum');
$row = mysql_fetch_assoc($res);
$id = $row['id'];
//执行该id+1运算
$id = $id+1;
//执行结果，再写入数据库
mysql_query("update testnum set id = $id");
// mysql_query('unlock tables');
//文件解锁
flock($fh,LOCK_UN );