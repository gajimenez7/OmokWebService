<?php //index.php

const SIZE = 15;

const STRATEGIES = array('Smart' => 'SmartStrategy','Random'=> 'Random' );

$info = array('size' => SIZE, 'strategies' => array_keys (STRATEGIES));

echo json_encode($info);