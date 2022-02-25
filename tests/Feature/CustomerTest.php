<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Http\Response;

use Tests\TestCase;
use App\Models\{Cidade,Estado};

class CustomerTest extends TestCase
{
    use RefreshDatabase;    
    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function test_get_all(){
         $response = $this->getJson('/api/cidades');
         $response->assertStatus(200);
     }


     public function test_get_single(){
         $cidade = Cidade::factory()->create();
        $response = $this->getJson("/api/cidades/{$cidade->id}");
        $response->assertStatus(200);

     }

    public function test_can_create()
    {
        $this->postJson('/api/cidades',
        [
            "estado" => "Luango",
            "cidade" => "Teste2" 
            
        ])
        ->assertStatus(Response::HTTP_CREATED);
        
        
    }
    public function test_valid_create(){
        $this->postJson('/api/cidades',
        [
            
        ])
        ->assertStatus(422);
        
    }
    public function test_can_update(){
        $cidade = Cidade::factory()->create();

        $this->putJson("/api/cidades/{$cidade->id}",
        [
            "cidade" => "Teste10" 
            
        ])
        ->assertStatus(Response::HTTP_OK);
        
    }
    public function test_exists_cidade(){
        $response = $this->getJson("/api/cidades/search",
    [
        "nome" => "salvador"
    ]
    );
        $response->assertStatus(200);
    }
    public function test_exists_not_found_cidade(){
        
        
        $response = $this->postJson('/api/cidades',
        [
           "nome" => "fake" 
        ]);
        $response->assertStatus(422);
    }

}
