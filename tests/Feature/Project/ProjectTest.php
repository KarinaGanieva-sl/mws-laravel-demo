<?php

namespace Tests\Feature;
use App\Models\Project;
use App\Models\User;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    public function test_user_can_see_project()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/projects', [
            'name' => 'test proj',
            'description' => 'test proj',
            'github_link' => 'https://github.com/KarinaGanieva-sl/test_repository',
            'owner_id' => '1',
            'creator_id' => '1'
        ]);

        $this->assertAuthenticated();
        $response->assertStatus(200);
        $user->delete();
    }

    public function test_user_can_add_project()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->post('/projects', [
            'name' => 'test proj',
            'description' => 'test proj',
            'github_link' => 'https://github.com/KarinaGanieva-sl/test_repository',
            'owner_id' => '1',
            'creator_id' => '1'
        ]);

        $this->assertAuthenticated();
        $response->assertStatus(302);
    }
}
