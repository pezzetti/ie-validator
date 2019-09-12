<?php 
namespace Pezzetti\InscricaoEstadual\Util\Validator;

abstract class StateValidator {

	public function isValidIE(string $ie) : bool {	        
		return $this->checkLength($ie) &&
		       $this->itStartsWith($ie) &&
			   $this->calcIE($ie);
		
	}
	
	protected function checkLength(string $ie) : bool {		        
		return strlen($ie) == 9;
	}
	
	abstract protected function itStartsWith(string $ie) : bool;
	
	abstract protected function calcIE(string $ie) : bool;
	
}