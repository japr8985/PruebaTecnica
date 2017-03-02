<?php 


class Database
{
	private $link;
	private $host, $user, $pass, $database;

	public $dimensions;
	function __construct()
	{
		$this->host = "localhost";
		$this->user = "postgres";
		$this->pass = "123456";
		$this->database = "cube";

		$conStr = "host=$this->host port=5432 user=$this->user password=$this->pass dbname=$this->database";
		$this->link = pg_connect($conStr);
		
	}
	public function findCube(Cube $cube)
	{
		$query = "SELECT * from cubes where id = ".$cube->id;
		$result = pg_query($query);
		return pg_fetch_object($result);
	}

	public function newCube(Cube $cube)
	{
		$values = $cube->getCube();

		$values = str_replace("[", "{", $values);
		$values = str_replace("]", "}", $values);

		$query = "INSERT INTO cubes (cube) values ('$values')";

		if (pg_query($query)) {
			return true;
		}
		return false;
			
	}	
}
?>