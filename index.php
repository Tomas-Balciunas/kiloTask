<?php

use kilo\Execute;
require "vendor/autoload.php";

array_shift($argv);

$result = new Execute($argv);
echo $result->callCommand();