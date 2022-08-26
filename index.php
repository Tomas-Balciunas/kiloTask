<?php

namespace kilo;
require "vendor/autoload.php";

array_shift($argv);

$result = new Controller($argv);
echo $result->fetch();