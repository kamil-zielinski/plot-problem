<?php

require __DIR__.'/vendor/autoload.php';

$input = new Problem2\Input;
$calculator = new Problem2\PlotCalculator($input);
$calculator->calculate();
echo implode(' ', $calculator->getResultAsArray());
