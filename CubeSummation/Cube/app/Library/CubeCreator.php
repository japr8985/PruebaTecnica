<?php namespace App\Library;

/**
* 
*/

class CubeCreator
{
	public $cube, $dimension;

	function __construct()
	{
		
	}

	public function setDimension($dimension)
	{
		$this->dimension = $dimension;
	}

	public function setDefaultCube()
	{
		$matrix = array();
		for ($i=0; $i < $this->dimension ; $i++) { 
			array_push($matrix,array());
			for ($j=0; $j < $this->dimension ; $j++) {
				array_push($matrix[$i], array());
				for ($k=0; $k < $this->dimension ; $k++) { 
					array_push($matrix[$i][$j], 0);
				}
			}
		}
		$this->cube = $this->to_pg_array($matrix);
	}

	public function getCube()
	{
		return $this->cube;
	}

	private function to_pg_array($set) {
	    settype($set, 'array'); // can be called with a scalar or array
	    $result = array();
	    foreach ($set as $t) {
	        if (is_array($t)) {
	            $result[] = $this->to_pg_array($t);
	        } else {
	            $t = str_replace('"', '\\"', $t); // escape double quote
	            if (! is_numeric($t)) // quote only non-numeric values
	                $t = '"' . $t . '"';
	            $result[] = $t;
	        }
	    }
	    return '{' . implode(",", $result) . '}'; // format
	}

}
