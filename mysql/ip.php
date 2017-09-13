<?php
//ip转换
$intIP = ip2long('127.0.0.1');
echo $intIP;
echo '<hr>';
$strIP = long2ip($intIP);
echo $strIP;