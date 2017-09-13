<?php
//复合类型存储
$mem = new Memcache();
$mem->connect('192.168.127.112',11211);
//数组
$array = array(
    'name' => 'tom',
    'age' => 4,
    'job' => 'php'
  );
//object
//定义一个类
class Person{
  //定义属性
  public $name;
  public $age;
  //构造方法
  public function __construct($name,$age){
    //用来初始化属性等相关操作的
    $this->name = $name;
    $this->age = $age;
  }
  //具体实现方法
  public function say(){
    echo $this->name.'say,he is '.$this->age;
  }
}
//实列化对象
$person = new Person('tom',4);
//存储数据
$rs1 = $mem->set('array',$array,0,0);
$rs2 = $mem->set('obj',$person,0,0);
var_dump($rs1);
echo '<hr>';
var_dump($rs2);
echo '<hr>';
//获取数据
$data1 = $mem->get('array');
$data2 = $mem->get('obj');
var_dump($data1);
echo '<hr>';
var_dump($data2);
echo '<hr>';