<?php
/*
 *  session入memcache操作
 *
 *  Time:2017年9月6日09:27:49
 *
 *  author: heart
 */
//session存储的方式设置
ini_set('session.save_handler', 'memcache');
//session存储的位置
ini_set('session.save_path', 'tcp://127.0.0.1:11211');
//开启session
session_start();
//设置session
// $_SESSION['name'] = 'itcast';
// echo session_id();
//读取session
echo '<hr>';
echo $_SESSION['name'];