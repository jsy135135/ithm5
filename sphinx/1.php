<?php
require './sphinxapi.php';
$s = new SphinxClient;
$s->setServer("127.0.0.1", 9312);
// $s->setMatchMode(SPH_MATCH_ANY);
// $s->setMaxQueryTime(3);
$result = $s->query("linux");
echo $s->getLastError();
var_dump($result);