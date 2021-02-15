<?php
require 'vendor/autoload.php';

use Amp\Parallel\Worker;
use Amp\Promise;

\printf('Sleeping 3 * 10sec in one go!' . PHP_EOL);

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

echo $end - $start . ' Seconds';


echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

\printf('Sleeping 3 * 10sec blocking :(' . PHP_EOL);

$start = time();

echo sleeper(10) . PHP_EOL;
echo sleeper(10) . PHP_EOL;
echo sleeper(10) . PHP_EOL;

$end = time();

echo $end - $start . ' Seconds';