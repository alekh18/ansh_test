<?php

namespace libraries;


class Calculator
{
    private $arrintParamters;

    /**
     * @param mixed $arrintParamters
     */
    public function setParamters($arrintParamters)
    {
        $this->arrintParamters = $arrintParamters;
    }

    public function sum() {
        $arrParameters = explode(',', $this->arrintParamters);

        return array_sum($arrParameters);
    }
}