<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class lopeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /*public function testExample()
    {
        $this->assertTrue(true);
    }*/
    function test_carga_lista_de_usuarios(){
    	$this->get('/usuarios')
    	->assertStatus(200)
    	->assertSee('users');
    }
}
