<?php
declare(strict_types=1);

namespace app\Operators;


use app\Operators\Operator;

class ModXtoY extends Operator
{
    protected $signOperation = '%';
    protected $operandsCount = 2;
     
    protected function doCalc(array $operands):int
    {
        return intdiv($operands[0],$operands[1]);
    }
     
}