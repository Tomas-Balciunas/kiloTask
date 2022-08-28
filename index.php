<?php

require "vendor/autoload.php";

use kilo\Execute;

array_shift($argv);
$result = new Execute($argv);
echo $result->callCommand();


