<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cube;
use App\Http\Requests\CubeRequest;
use App\Http\Requests\CubeUpdateRequest;
use App\Http\Requests\CubeSumRequest;
use App\Library\CubeCreator;
class CubesController extends Controller
{
    //
    public function index()
    {
    	$cubes = Cube::orderBy('id','ASC')->paginate(5);
    	return view('cubes.index')->with('cubes',$cubes);
    }

    public function create()
    {
    	return view('cubes.create');
    }

    public function store(CubeRequest $req)
    {
        $cube = new Cube($req->all());
        
        //Creando cubo
        $matrix = new CubeCreator();
        $matrix->setDimension($req->dimension);
        $matrix->setDefaultCube();
        
    	$cube->cube = $matrix->getCube();
    	$cube->save();
        flash(
            $cube->name . ' has been created',
            'info');
    	return redirect('cubes/list');
    }

    public function update($id)
    {   
    
        $cube = Cube::find($id);
        return view('cubes.update')->with('cube',$cube);
    }

    public function processUpdate(CubeUpdateRequest $req, $id)
    {
        
        
        $cube = Cube::find($id);

        $matrix = new CubeCreator();
        $matrix->setCube($cube->cube);
        
        $matrix->update($req->x,$req->y,$req->z,$req->value);

        $cube->cube = $matrix->updateCube();
        $cube->save();

        $msg = $cube->name . " has been updated in (" . $req->x . ', '.$req->y.', '.$req->z .') with '.$req->value; 
        
        flash($msg,'info');
        return view('cubes.update')->with('cube',$cube);

    }

    public function query($id)
    {
        $cube = Cube::find($id);

        return view('cubes.query')->with('cube',$cube);
    }

    public function processQuery(CubeSumRequest $req,$id)
    {

	
        $cube = Cube::find($id);

        $matrix = new CubeCreator();
        $matrix->setCube($cube->cube);
        
        

        $sum = $matrix->getCubeSum($req->x1,$req->y1,$req->z1,$req->x2,$req->y2,$req->z2);
        $msg = "The sum from (".$req->x1 .",".$req->y1.",".$req->z1.") to (".$req->x2.",".$req->y2.",".$req->z2.") is ".$sum;
        flash($msg,'info');

        return view('cubes.query')->with('cube',$cube);
        
    }

    public function delete($id)
    {
        $cube = Cube::find($id);
        
        $msg = 'The cube '.$cube->name.' has been deleted';
        $cube->delete();
        flash($msg,'danger');
        return redirect('cubes/list/');

    }
}
