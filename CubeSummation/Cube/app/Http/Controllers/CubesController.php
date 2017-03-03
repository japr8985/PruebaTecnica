<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cube;
use App\Http\Requests\CubeRequest;
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

    public function store(CubeRequest $req){
    	$cube = new Cube($req->all());
    	$cube->cube = "aqui va el cubo =D";
    	$cube->save();
    	return redirect('cubes/list');
    }

    
}
