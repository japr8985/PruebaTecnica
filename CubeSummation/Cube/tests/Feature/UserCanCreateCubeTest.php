<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCanCreateCubeTest extends TestCase
{
	protected $baseUrl = 'http://localhost:8000';
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        
    }

    /*
    * @test
    */
    public function home_page(){
    	$this->visit('/')
    		->click('CUBES')
    		->see('Cube Creator');
        }

    /**
    *	@test
    */
    public function form_cube(){
    	$this->visit('/cubes/create');
    }
}
