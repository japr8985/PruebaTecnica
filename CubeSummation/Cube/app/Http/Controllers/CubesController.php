<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cube;
use App\Http\Requests\CubeRequest;
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
        flash('Message','info');
    	return redirect('cubes/list');
    }

    public function actions($id)
    {
    	$cube = Cube::find($id);
    	return view('cubes.actions')
    		->with('cube',$cube);
    }

    public function update(Request $req, $id)
    {
    	$cube = Cube::find($id);

    	$matrix = new CubeCreator();
        $matrix->setCube($cube->cube);
        
        $matrix->update($req->x,$req->y,$req->z,$req->value);

        $cube->cube = $matrix->updateCube();
        $cube->save();

        flash($cube->name . " has been updated");

        return redirect('cubes/list');

    }
    public function query(Request $req,$id)
    {
    	try {
           $cube = Cube::find($id);
            $matrix = new CubeCreator();
            $matrix->setCube($cube->cube);
            $result = $matrix->getCubeSum($req->x1,$req->y1,$req->z1,$req->x2,$req->y2,$req->z2);
            
            flash($result); 
        } catch (Exception $e) {
            flash($e->getMessage());            
        }

        return redirect('cubes/list');



    }
}
