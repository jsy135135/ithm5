<?php
$fh = fopen('./lock.txt','w');
flock($fh,LOCK_EX );//添加锁
echo 1111;