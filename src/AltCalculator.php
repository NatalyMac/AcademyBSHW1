<?php
declare(strict_types=1);

namespace app;

use app\AltOperators\{AltMultiXtoY};

//use app\Operands\IntOperand;


class AltCalculator
{
	protected $operand1 = null;
    protected $operand2 = null;
    protected $operation = null; 
    
    protected function setOperands(int $operand1, int $operand2)
    {
    	$this->operand1 = $operand1;
        $this->operand2 = $operand2;
    }

    protected function setOperation(string $operation)
    {
     
        switch ($operation)
        {
        	case "*":
        	    $this->operation = new AltMultiXtoY();
        	    break;
            default:
                throw new \BadFunctionCallException("Can not do this operation " . $operation ."\n");
            
        }
    }

    
    public function run(int $operand1, int $operand2, string $operation)
    {
        $this->setOperands($operand1, $operand2);
        $this->setOperation($operation);
        return $this->operation->calc($this->operand1, $this->operand2);
    }
    
}