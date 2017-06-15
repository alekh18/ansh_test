<?php

function __autoload($strClassName) {
    require_once __DIR__ . '\\' . $strClassName . '.php';
}

if (2 > $argc) {
    echo "Insufficient parameters supplied...\n";
    exit;
}

$strMethod = $argv[1];
$strmixParameters = (!isset($argv[2])) ? 0 : $argv[2];

$objCalculator = new \libraries\Calculator();

switch ($strMethod) {
    case 'sum' :
        $objCalculator->setParamters($strmixParameters);
        echo $objCalculator->sum();
        break;
    default :
        echo "Invalid method called...";
        exit;
}