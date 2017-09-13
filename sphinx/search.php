<?php
//声明header
header('Content-type:text/html;charset=utf-8');
//引入api
require './sphinxapi.php';
?>
<form action="" method="get">
  关键词：<input type="text" name="keywords" /><br/>
  <input type="submit" name="" value="查询">
</form>
<?php
//实例化
$sphinx = new SphinxClient();
//连接查询服务
$sphinx->setServer("127.0.0.1", 9312);
//匹配模式
// $sphinx->setMatchMode(SPH_MATCH_ALL);
$sphinx->setMatchMode(SPH_MATCH_ANY);
// $sphinx->setMatchMode(SPH_MATCH_PHRASE);
// $sphinx->setMatchMode(SPH_MATCH_BOOLEAN);
//返回数据的条数
$sphinx->setLimits(0,10);
//查询的关键词
$keywords = isset($_GET['keywords']) ? $_GET['keywords'] : '';
// $keywords = 'memcache';
//查询返回结果
// $result = $sphinx->query("$keywords !redis");
$result = $sphinx->query($keywords);
// echo $sphinx->getLastError();die();
// var_dump($sphinx->status());
//输出结果查看
// var_dump($result);die();
// 查询情况的显示
//匹配返回到多少个
echo '匹配返回:'.$result['total'].'个<br />';
//本次显示多少个
echo '本次显示'.count($result['matches']).'个<br />';
//查询时间
echo '共用了'.$result['time'].'s';
//错误提示输出
if(empty($result['matches']) === true){
  echo '没有获取到查询结果!';
  exit();
}
//遍历组合id
$ids = '';
foreach ($result['matches'] as $key => $value) {
  $ids .= $key.',';
}
$ids = trim($ids,',');
// var_dump($ids);
//通过返回的id查询真实数据
mysql_connect('127.0.0.1','root','root');
mysql_query('set names utf8');
mysql_query('use ithm5');
//查询语句
$sql = "select * from zhilian where id in ($ids)";
$result = mysql_query($sql);
$data = array();
while ($row = mysql_fetch_assoc($result)) {
  //增加标签语法
  $row = $sphinx->buildExcerpts($row,'zhilian',$keywords,array(
  'before_match' => '<span style="color:#ea0fd8;font-weight:bold;font-size:18px;" >',
  'after_match' => '</span>'
  ));
  $data[] = $row;
}
// var_dump($data);
foreach ($data as $key => $value) {
  foreach ($value as $k => $v) {
    echo '<p>'.$v.'</p>';
  }
}