<?php
//相关时间函数
//时间戳
$nowTime = time();
echo $nowTime;
//时间戳转时间格式
echo '<hr>';
$nowDate = date('Y-m-d H:i:s',$nowTime);
echo $nowDate;
echo '<hr>';
//时间格式字符串转为时间戳
echo strtotime($nowDate);
//算前两天当前时间的时间戳
$beforeTwo = time() - 3600*24*2;
echo '<hr>';
echo $beforeTwo;
echo '<hr>';
echo date('Y-m-d H:i:s',$beforeTwo);
echo '<hr>';
//计算上个星期五的日期
echo date('Y-m-d',strtotime("last Friday"));