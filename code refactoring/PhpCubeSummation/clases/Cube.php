<?php 

/**
* 
*/
class Cube
{
	protected $id, $cube, $dimensions;

	function __construct()
	{
		# code...
	}
	
	public function setDimensions($val = 0)
	{
		$this->dimensions = $val;
	}
	public function createCube()
	{
		$cube = array();
		for ($i=0; $i < $this->dimensions ; $i++) { 
			array_push($cube, array());
			for ($j=0; $j < $this->dimensions ; $j++) { 
				array_push($cube[$i], array());
				for ($k=0; $k < $this->dimensions ; $k++) { 
					array_push($cube[$i][$j], 55);
				}
			}
		}
		$this->cube = json_encode($cube);
		
	}

	public function getCube()
	{
		return $this->cube;
	}

	public function getDimensions()
	{
		return $this->dimensions;
	}

	public function update($x, $y, $z, $val = 0)
	{
		
	}
}

 ?>