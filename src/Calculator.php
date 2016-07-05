<?php
declare(strict_types=1);

namespace app;

use app\Operators\{
	Pow2toY, AddXtoY, MultiXtoY, ModXtoY, SubXtoY};

use app\Operands\IntOperand;

interface Logger 
{
      public function log(array $func, array $args);
}


class Calculator
{
	protected $operands = array();
    protected $operation = null; 
    private $logger = null;
    
    protected function setOperands(array $operands)
    {
    	$this->operands = (new IntOperand($operands))->getOperands();
    }

    protected function setOperation(string $operation)
    {
     
        switch ($operation)
        {
        	case "2^":
        	    $this->operation = new Pow2toY();
        	    break;
        	case "+":
        	    $this->operation = new AddXtoY();
        	    break;
        	case "-":
        	    $this->operation = new SubXtoY();
        	    break;
        	case "%":
        	    $this->operation = new ModXtoY();
        	    break;
        	case "*":
        	    $this->operation = new MultiXtoY();
        	    break;
        	default:
        	    throw new \BadFunctionCallException("Can not do this operation " . $operation ."\n");
        }
    }

    public function getLogger(): Logger 
    {
        return $this->logger;
    }

    public function setLogger(Logger $logger) 
    {
        $this->logger = $logger;
    }  
    
    public function run(array $operands, string $operation)
    {
        $this->setOperands($operands);
        $this->setOperation($operation);
        return $this->operation->calc($this->operands);
    }
    
}
  
