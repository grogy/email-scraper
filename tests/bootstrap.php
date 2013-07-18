<?php

require __DIR__ . "/../vendor/autoload.php";
foreach (glob("./../src/{app,config,model}/*", GLOB_BRACE) as $fileName)
	include $fileName;
