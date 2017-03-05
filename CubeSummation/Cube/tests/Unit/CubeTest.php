<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Library\CubeCreator;

class CubeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    
    public function test_index_page()
    {
    	$this->get('/')->assertStatus(200);
    }

    public function test_list_page()
    {
    	$this->get('/cubes/list')->assertStatus(200);
    }

    public function test_create_cube_page()
    {
    	$this->get('/cubes/create')->assertStatus(200);
    }

    public function test_cube_update_page()
    {
    	$this->get('/cubes/update/6')->assertStatus(200);
    	$this->get('/cubes/update/7')->assertStatus(500);
    	$this->get('/cubes/update/9')->assertStatus(500);
    }

    public function test_cube_query_page()
    {

    	$this->get('/cubes/query/6')->assertStatus(200);
    	$this->get('/cubes/update/8')->assertStatus(500);
    	$this->get('/cubes/update/10')->assertStatus(200);
    }

    public function test_update_cube()
    {
    	$this->put('/cubes/update/15')
    		->type('x',2)
    		->type('y',3)
    		->type('z',4)
    		->type('value',123);
    }




}
