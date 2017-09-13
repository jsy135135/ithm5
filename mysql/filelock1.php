<?php
$fh = fopen('./lock.txt','w');
flock($fh,LOCK_EX );//添加锁
//模拟阻塞10s
sleep(10);
flock($fh,LOCK_UN );
