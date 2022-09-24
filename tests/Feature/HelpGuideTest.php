<?php

namespace Tests\Feature;

use App\Models\HelpGuide;
use Auth;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HelpGuideTest extends TestCase
{
    use DatabaseMigrations;
    use HasFactory;


    public function test_guest_can_read_all_help_guides()
    {

        $this->withoutExceptionHandling();

        $helpGuide = HelpGuide::factory()->create();

        $response = $this->get('/help-guides');

        $response->assertSee($helpGuide->link);
    }

    public function test_authenticated_users_can_create_a_new_help_guides()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user);

        $helpGuide = HelpGuide::factory()->make();

        $this->post('/user-help-guides',$helpGuide->toArray());

        $this->assertEquals(1,HelpGuide::all()->count());
    }

    public function test_unauthenticated_users_cannot_create_a_new_help_guide()
    {

        $helpGuide = HelpGuide::factory()->make();

        $this->post('/user-help-guides',$helpGuide->toArray())
             ->assertRedirect('/login');
    }


    public function test_authorized_user_can_delete_the_help_guide()
    {

        $user = User::factory()->create();

        $this->actingAs($user);

        $helpGuide = HelpGuide::factory()->create()->make(['user_id' => $user->id]);
        $this->delete('/user-help-guides/'.$helpGuide->id);
        $this->assertDatabaseMissing('help_guides',['id'=> $helpGuide->id]);

    }

}
