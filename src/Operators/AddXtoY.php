<?php
declare(strict_types=1);

namespace app\Operators;


use app\Operators\Operator;

class AddXtoY extends Operator
{
    protected $signOperation = '+';
    protected $operandsCount = 2;
     
    protected function doCalc(array $operands):int
    {
        return $operands[0] + $operands[1];
    }
     
}