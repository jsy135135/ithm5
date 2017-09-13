<?php
//session入memcache
//设置session的存储方式
ini_set('session.save_handler', 'memcache');
//存储地址
ini_set('session.save_path','tcp://192.168.127.112:11211');
//开启session
session_start();
//存储session
$_SESSION['name'] = 'jerry';
echo session_id().'<br />';
var_dump($_SESSION['name']);