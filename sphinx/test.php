<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>职业技能点查询</title>
</head>
<body>
  <form action="">
    查询:<input type="text" name="keywords" value="<?php echo $_GET['keywords']?>" />
    <input type="submit" name="" value="查询" />
  </form>
</body>
</html>
<?php
//设置输出字符编码
header("Content-type:text/html;charset=utf-8");
//引入类文件
require './sphinxapi.php';
$sphinx = new SphinxClient;
$sphinx->setServer("127.0.0.1", 9312);
//匹配模式
$sphinx->setMatchMode(SPH_MATCH_ALL);
//设置查询连接超时时间
$sphinx->setMaxQueryTime(3);
//设置返回的条数
$sphinx->setLimits(0,10);
//查询关键词
//判断是否具有keywords
if(isset($_GET['keywords']) && !empty($_GET['keywords'])){
  $keywords = $_GET['keywords'];
  //查询sphinx的索引
  $result = $sphinx->query($keywords);
  //输出打印返回查询结果
  // var_dump($result);die();
  $matches = $result['matches'];
  //查询返回的相关参数信息
  echo '查询到总数为'.$result['total_found'].'<br />';
  echo '返回数为'.$result['total'].'<br />';
  echo '耗费时间为'.$result['time'].'s<br />';
  $ids = '';
  // where id in(1,2,3,4)
  //遍历数组，获取key信息
  foreach ($matches as $key => $value) {
    $ids .= ','.$key;
  }
  $ids = ltrim($ids,',');
  //获取到id信息
  // echo $ids;
  // 连接数据库查询
  //连接数据库
  mysql_connect('127.0.0.1','root','root');
  //字符串编码
  mysql_query('set names utf8');
  //选择数据库
  mysql_query('use php59');
  //查询数据
  $result = mysql_query('select * from zhilian where id in('.$ids.')');
  //建立一个空数组
  $data = array();
  //遍历资源集
  while ($row = mysql_fetch_assoc($result)) {
    // var_dump($row);
    // echo '<br />';
    //每条数据增加标签
    $row = $sphinx->buildExcerpts($row,'zhilian',$keywords,array(
    'before_match' => '<span style="color:red;font-weight:bold;" >',
    'after_match' => '</span>'
    ));
    // var_dump($row);die;
    //组合数据为二维数组
     $data[] = $row;
  }
  // var_dump($data);die;
  //遍历数组显示格式
  foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
      // echo $k.'<br />';
      //最后一行加一个hr
      if($k == 11){
        echo '<p>'.$v.'</p><hr/>';
      }elseif($k == 'title'){
        echo '<p>'.$v.'</p>';
      }
    }
  }
}else{
  echo '请输出关键词!';
}

?>
