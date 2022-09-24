<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CovidStatTest extends TestCase
{
    use DatabaseMigrations;
    use HasFactory;

    /** @test */
    public function test_guest_can_read_covid_stat()
    {

        $this->withoutExceptionHandling();

        $response = $this->get('/');

        $response->assertSuccessful();
    }

}
