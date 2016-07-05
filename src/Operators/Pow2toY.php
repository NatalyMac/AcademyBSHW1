<?php

declare(strict_types=1);

namespace app\Operators;


use app\Operators\Operator;


class Pow2toY extends Operator
{
    protected $signOperation = '2^';
    protected $operandsCount = 2;
    protected $base = 2;
     
    protected function doCalc(array $operands):float
    {
        if ($operands[0] != $this->base)
            throw new \InvalidArgumentException("First Operand  must be equal 2 \n");
        return pow($operands[0], $operands[1]);
    }
     
}