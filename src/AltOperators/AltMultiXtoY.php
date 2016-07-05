<?php
declare(strict_types=1);

namespace app\AltOperators;

class AltMultiXtoY
{
	protected $signOperation = '*';

    public function calc(int $operand1, int $operand2):int
    {
        return $operand1 * $operand2;
    }
     
}