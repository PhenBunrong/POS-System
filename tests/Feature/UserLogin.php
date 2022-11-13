<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLogin extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function UserCanLoginForm()
    {
        $response = $this->get('admin/login');

        $response->assertSuccessful();

        $response->assertViewIs('backpack::auth.login');
    }

    /** @test */
    public function UserCanLogin()
    {
        $response = $this->post('admin/login',
        	[
                'email' => 'superadmin@gmail.com',
                'password' => '12345678'
            ]);
        
        $response->assertRedirect('admin/dashboard');
    }

    /** @test */
    public function UserCanLoginFactory()
    {
        $user = factory(User::class)->create();

        $response = $this->post('admin/login',
                [
                    'email' => $user->email,
                    'password' => '123456789'
                ]);

        $response->assertRedirect('admin/dashboard');
    }
}
