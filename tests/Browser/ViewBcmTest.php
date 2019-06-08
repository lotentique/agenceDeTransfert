<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class ViewBcmTest extends DuskTestCase
{
   use DatabaseMigrations;

    /** @test 
    * @group ViewBCM
   */
    public function conexionBcm()
    {
        //$user = factory(User::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee(config('app.name'))
                ->assertSee("CONFIRMER")
                ->type('login','bcm')
                ->type('password','123456')
                ->press('CONFIRMER')
                ->assertPathIs('/bcm')
                ->pause(2000);
        });
    }
}