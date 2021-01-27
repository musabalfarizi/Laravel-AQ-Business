<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

   public function testApplication()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/');
        $response = assertSuccessful();
    }

    

    public function index_returns_a_view()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(post('category'));

        $response = assertSuccessful();
    }

    public function test_console_command()
{
    $this->artisan('question')
         ->expectsQuestion('What is your name?', 'Taylor Otwell')
         ->expectsQuestion('Which language do you program in?', 'PHP')
         ->expectsOutput('Your name is Taylor Otwell and you program in PHP.')
         ->assertExitCode(0);
}
}
