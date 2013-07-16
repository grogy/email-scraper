<?php

define("SRC_DIR", __DIR__);

// simple autoload
require __DIR__ . "/../vendor/autoload.php";
foreach (glob("./src/{app,config,model}/*", GLOB_BRACE) as $fileName)
	include $fileName;

$configurator = new \Project\Config\Configurator();

$robot = $configurator->getAppAutomaticRobot();
$robot->run();
