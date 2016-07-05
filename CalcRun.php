<?php
declare(strict_types=1);

use app\{Logger,Calculator};


$loader = require( __DIR__ . '/vendor/autoload.php' );
 
$calc = new Calculator;

$calc->setLogger(new class implements Logger {
    
    public $logFile = 'log.txt';

    public function log(array $func, array $args) 
    {   
    	$res=0;
    	$errorMsg = '';    	
    	
    	try {
            $res = call_user_func_array($func, $args);
            }
        catch (\InvalidArgumentException $e) 
                    { $errorMsg = $e->getMessage(); }
        catch (\DivisionByZeroError $e) 
                    { $errorMsg = $e->getMessage(); }
        catch (\BadFunctionCallException $e) 
                    { $errorMsg = $e->getMessage(); }
    	
    	$format = "%s operator %s operand1 %s operand2 %s result %s \n";
    	$dateLog = date('D M d H:i:s Y',time());
    	$operation = $args[1];
    	$operand1 = (string)$args[0][0];
    	$operand2 = (string)$args[0][1];
    	$result   = (string)$res;
        
        $this->writeToFile($this->logFile, $format, $dateLog, $operation, $operand1, $operand2, $result, $errorMsg);
  
        printf($format, $dateLog, $operation, $operand1, $operand2, $result);
    	print($errorMsg."\n");
   
    }
    
    protected function writetoFile(string $file, string $format, string $dateLog, string $operation, 
    	                          string $operand1, string $operand2, string $result, string $errorMsg )
    {
        $fh = fopen($file, 'a+');
    	fprintf($fh,$format, $dateLog, $operation, $operand1, $operand2, $result);
    	fwrite($fh, $errorMsg."\n");
    	fclose($fh);
    }
});

$calc->getLogger()->log([$calc, "run"], [[2,2], "2^"]);
$calc->getLogger()->log([$calc, "run"], [[2], "2^"]);
$calc->getLogger()->log([$calc, "run"], [[3,2], "2^"]);
$calc->getLogger()->log([$calc, "run"], [[2,-2], "2^"]);

$calc->getLogger()->log([$calc, "run"], [[2,3], "+"]);
$calc->getLogger()->log([$calc, "run"], [[2.1,3], "+"]);

$calc->getLogger()->log([$calc, "run"], [[2,3], "-"]);
$calc->getLogger()->log([$calc, "run"], [[2.8,3], "-"]);

$calc->getLogger()->log([$calc, "run"], [[2,3], "*"]);
$calc->getLogger()->log([$calc, "run"], [["2",3], "*"]);
$calc->getLogger()->log([$calc, "run"], [[2, 5.5], "*"]);

$calc->getLogger()->log([$calc, "run"], [[2,3], "%"]);
$calc->getLogger()->log([$calc, "run"], [[2,0], "%"]);
$calc->getLogger()->log([$calc, "run"], [[2,1.0], "%"]);
$calc->getLogger()->log([$calc, "run"], [[2,1,3], "%"]);
$calc->getLogger()->log([$calc, "run"], [[], "%"]);

$calc->getLogger()->log([$calc, "run"], [[2,3], "h"]);