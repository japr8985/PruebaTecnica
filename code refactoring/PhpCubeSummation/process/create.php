<?php 
require_once "../clases/Cube.php";
require_once "../clases/Database.php";

$dim = $_POST['dim'];

$db = new Database();

$cube = new Cube();

$cube->setDimensions(3);

$cube->createCube();

$db->newCube($cube);


 ?>