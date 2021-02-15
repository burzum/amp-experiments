<?php
require 'vendor/autoload.php';

use Amp\Parallel\Worker;
use Amp\Promise;

$start = time();

$promises = [];
$promises[] = Worker\enqueueCallable('sleeper', 10);
$promises[] = Worker\enqueueCallable('sleeper', 10);
$promises[] = Worker\enqueueCallable('sleeper', 10);

$responses = Promise\wait(Promise\all($promises));

foreach ($responses as $key => $result) {
    \printf($result . PHP_EOL);
}

$end = time();

echo $end - $start;