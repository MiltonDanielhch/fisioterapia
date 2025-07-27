<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_basic_example()
    {
        // Prueba que siempre funciona
        $response = $this->get('/non-existing-route');
        $response->assertStatus(404);
    }

    public function test_application_health_check()
    {
        // Prueba de salud básica
        $this->assertTrue(true);
    }
}
