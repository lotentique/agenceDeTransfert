<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class ViewAgentTest extends DuskTestCase
{
    use DatabaseMigrations;
    //use RefreshDatabase;

   /** @test 
    * @group ViewAgent
   */
    public function conexionAgent()
    {
        //$user = factory(User::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee(config('app.name'))
                ->assertSee("CONFIRMER")
                ->type('login','agent300')
                ->type('password','123456')
                ->press('CONFIRMER')
                ->assertPathIs('/agent')
                ->pause(2000);
        });
    }

    /** @test 
     * 
    */
    public function transfer(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/agent/trensfert/saisie')
                ->type('tel_expe',88888888)
                ->type('tel_benef',99999999)
                ->press('Comfirmer')
                ->pause(3000)
                //->assertSee("montant")
                ->type('montant',20000)
                ->select('ville',1)
                ->assertSee("Comfirmer")
                ->press('Comfirmer')
                ->pause(3000)
                ->press('Confirmer')
                ->pause(3000)
                //->visit('/agent')
                ;
        });
    }

    /** @test 
     * 
    */
    public function retrais(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/agent')
                ->type('code','56999')
                ->pause(2000)
                ->click('@val')
                ->pause(2000)
                ->type('nni_benef',1021421234)
                ->press('confirmer')
                ->pause(3000);
        });
    }
    /** @test 
     * 
    */
    public function misa_jour_caise_ajou(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/agent')
                ->click('@mjr')
                ->pause(2000)
                ->click('#ajt')
                ->pause(1000)
                ->type('montant',10000)
                ->press('Valider')
                ->click('#ajt')
                ->pause(1000);
        });
    }
    /** @test 
     * 
     */
    public function misa_jour_caise_retrir(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/agent')
                ->click('@mjr')
                ->pause(2000)
                ->click('#rtr')
                ->pause(1000)
                ->type('montant',10000)
                ->press('Valider')
                ->pause(1000);
        });
    }
}