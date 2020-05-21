<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Component;

class CreateComponentsTest extends TestCase
{
    use RefreshDatabase; 

    public function test_component_requires_name()
    {
        $this->signIn();
        $response = $this->post('/component', [
            'body' => 'something'
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_component_requires_body()
    {
        $this->signIn();
        $response = $this->post('/component', [
            'name' => 'something'
        ]);

        $response->assertSessionHasErrors('body');
    }

    public function test_guests_cannot_create_components() 
    {
        $this->post('/component')
            ->assertRedirect('/login');

        $this->get('/component/create')
            ->assertRedirect('/login');
    }

    public function test_user_can_create_private_component() {
        $this->withoutExceptionHandling();
        $this->signIn();
        $component1 = $this->post('/component', [
            'name' => 'something',
            'body' => 'another thing',
            'private' => 1
        ]);
        $this->get('/component')->assertDontSee($component1['name']);
        
        $component2 = $this->post('/component', [
            'name' => 'post',
            'body' => 'another body',
        ]);
        $this->get('/component')->assertSee($component2['name']);

    }
}