<?php
declare(strict_types=1);

namespace app\Operators;


abstract class Operator
{     
    protected $signOperation = null;
    protected $operandsCount = null;
     
    abstract protected function doCalc(array $operands);
     
    public function calc(array $operands)
    {
        if (count($operands) != $this->getOperandsCount())
            throw new \InvalidArgumentException("Operands count must be equal " . $this->getOperandsCount()."\n");
    
        $operands = array_values($operands);
        
        return $this->doCalc($operands);
    }
     
    public function getOperandsCount():int
    {
        if (is_null($this->operandsCount))
            throw new \InvalidArgumentException("Operands count is empty \n");
            
            return $this->operandsCount;
    }
}