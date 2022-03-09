<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class HelloTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        Task::factory()->create([
            'name'=>'aaa',
            'content'=>'bbb',
        ]);
        $this->assertDatabaseHas('users',[
            'name'=>'aaa',
            'content'=>'bbb',
        ]);
    }
}
