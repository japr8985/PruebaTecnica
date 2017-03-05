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

	private function to_pg_array($set) 
	{
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
	public function update($x = 1, $y = 1, $z = 1,$val)
	{
		$this->cube[$x - 1][$y - 1][$z -1] = $val;
	}

	public function getCubeSum($x1 = 1,$y1 = 1,$z1 = 1,$x2 = 1,$y2 = 1,$z2 = 1)
	{
		$sum = 0;
		for ($i=($x1 - 1); $i < $x2 ; $i++) { 
			for ($j=($y1 - 1); $j < $y2 ; $j++) { 
				for ($k=($z1 -1); $k < $z2  ; $k++) { 
					$sum += $this->cube[$i][$j][$k];
				}
			}
		}
		return $sum;
	}
	public function updateCube()
	{
		return $this->to_pg_array($this->cube);
	}
	public function setCube($cube)
	{
		$this->cube = $this->to_php_array($cube);
	}

	private function to_php_array($s, $start = 0, &$end = null) 
	{
	    if (empty($s) || $s[0] != '{') 
	    	return null;
	    $return = array();
	    $string = false;
	    $quote='';
	    $len = strlen($s);
	    $v = '';
	    for ($i = $start + 1; $i < $len; $i++) {
	        $ch = $s[$i];

	        if (!$string && $ch == '}') {
	            if ($v !== '' || !empty($return)) {
	                $return[] = $v;
	            }
	            $end = $i;
	            break;
	        } elseif (!$string && $ch == '{') {
	            $v = $this->to_php_array($s, $i, $i);
	        } elseif (!$string && $ch == ','){
	            $return[] = $v;
	            $v = '';
	        } elseif (!$string && ($ch == '"' || $ch == "'")) {
	            $string = true;
	            $quote = $ch;
	        } elseif ($string && $ch == $quote && $s[$i - 1] == "\\") {
	            $v = substr($v, 0, -1) . $ch;
	        } elseif ($string && $ch == $quote && $s[$i - 1] != "\\") {
	            $string = false;
	        } else {
	            $v .= $ch;
	        }
	    }

	    return $return;
		}

}
