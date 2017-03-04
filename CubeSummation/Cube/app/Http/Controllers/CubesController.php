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
    	dd($req->all());
    }
    public function query(Request $req,$id)
    {
    	dd("query");
    }
}
