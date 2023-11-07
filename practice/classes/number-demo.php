<?php

require 'number.php';
require 'even-number.php';
require 'debug.php'

use HES\Number;
use HES\EvenNumber;
use HES\Debug;

$example1 = new Number(9);
$example2 = new EvenNumber(9);

Debug::dump('Hello, world')