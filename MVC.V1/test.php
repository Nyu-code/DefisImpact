<?php

include('BDD.php');
include('ODDManager.php');
include('ODD.php');

$bd = new BDD();

// var_dump($bd);

$odd= $bd->getAllODD();

// var_dump($odd);

$test = new  ODDManager;

$tab = $test->getODD();

var_dump($tab);