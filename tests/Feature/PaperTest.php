<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Faculty;
class PaperTest extends TestCase
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
    }
    public function test_includesPapersOfTeacher()
    {
        $faculty = Faculty::factory()->hasPapers(3)->create();
        $response = $this->get('/api/papers?faculty_id='.$faculty->id);
        $response->dump();
        $response->assertJsonCount(3,'data');
        $response->assertStatus(200);
    }
}
