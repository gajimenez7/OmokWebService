<?php //index.php

define('SIZE', 15); 

const STRATEGIES = array('Smart' => 'SmartStrategy', 'Random' => 'RandomStrategy');

$info = array('size' => SIZE, 'strategies' => STRATEGIES);

echo json_encode($info);