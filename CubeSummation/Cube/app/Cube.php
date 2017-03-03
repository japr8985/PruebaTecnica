<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cube extends Model
{
    protected $table = "cubes";
    protected $fillable = ['name','dimension','cube'];
}
