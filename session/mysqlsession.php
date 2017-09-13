<?php
//通过重写session机制实现
//session入mysql
class MySessionHandler implements SessionHandlerInterface{
  //开启session
  public function open($save_path,$save_name){
    //连接数据库
    mysql_connect('127.0.0.1','root','root');
    mysql_query('use session');
    mysql_query('set names utf8');
    return true;
  }
  //关闭session
  public function close(){
    return true;
  }
  //写session
  public function write($session_id,$session_data){
    $sql = "insert into session values ('$session_id','$session_data','".time()."')";
    // echo $sql;die();
    mysql_query($sql);
    return true;
  }
  //读session
  public function read($session_id){
    $sql = "select * from session where session_id = '$session_id'";
    // echo $sql;
    $resource = mysql_query($sql);
    $row = mysql_fetch_assoc($resource);
    if($row['session_data']){
      return $row['session_data'];
    }else{
      //防止没有session报错
      return '';
    }
  }
  //销毁session
  public function destroy($session_id){
    $sql = "delete from session where session_id = '$session_id'";
    // echo $sql;die();
    mysql_query($sql);
    return true;
  }
  //gc回收机制
  public function gc($maxlifetime){

  }
}
//重写session机制
$handler = new MySessionHandler();
session_set_save_handler($handler, true);
session_start();
// $_SESSION['name'] = 'ithm555';
// $_SESSION['age'] = '18';
// echo session_id();
// echo '<hr>';
// var_dump($_SESSION['name']);
// var_dump($_SESSION['age']);
// //销毁session
session_destroy();
// echo '<hr>';
var_dump($_SESSION['name']);
var_dump($_SESSION['age']);