<?php
declare(strict_types=1);

namespace app\Operands;


class IntOperand
{     
    protected $operands = array(); 
    
    public function __construct(array $operands)
    {
        $result=true;
        foreach ($operands as $operand) 
        {
            $result = $result && is_int($operand);
            $this->operands[] = $operand;
        }
        
    if ($result == false)
        throw new \InvalidArgumentException("Operands must be integer \n");
    }
     
    public function getOperands():array
    {
        return $this->operands; 
    }
}