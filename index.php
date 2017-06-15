<?php

function __autoload($strClassName) {
    require_once __DIR__ . '\\' . $strClassName . '.php';
}

if (2 > $argc) {
    echo "Insufficient parameters supplied...\n";
    exit;
}

$strMethod = $argv[1];
$strmixParameters = (!isset($argv[2])) ? 0 : str_replace('\n', ',', $argv[2]);

$arrmixDelimiter = array();
preg_match('/^[\\\\].+[\\\\]/', $strmixParameters, $arrmixDelimiter);

if(0 < count($arrmixDelimiter)) {
    $arrmixDelimiterWOQuotes = array();
    preg_match('/[^\\\\]+/', $arrmixDelimiter[0], $arrmixDelimiterWOQuotes);

    $strmixParameters = str_replace($arrmixDelimiterWOQuotes[0], ',', preg_replace('/^[\\\\].+[\\\\]/', '', $strmixParameters));
}

$objCalculator = new \libraries\Calculator();

switch ($strMethod) {
    case 'add' :
        $objCalculator->setParamters($strmixParameters);
        echo $objCalculator->add();
        break;
    default :
        echo "Invalid method called...";
        exit;
}