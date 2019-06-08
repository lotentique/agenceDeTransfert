<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class ViewAdminTest extends DuskTestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    /** @test 
     * @group ViewAdmin
    */
    public function conexionAdmin()
    {
        //$user = factory(User::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee(config('app.name'))
                ->assertSee("CONFIRMER")
                ->type('login','admin')
                ->type('password','123456')
                //->click('CONFIRMER')
                ->click('@confir')
                ->assertPathIs('/admin')
                ->pause(3000);

        });
    }

    /** @test */
    public function Utilisateurs()
    {
        //$user = factory(User::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/Utilisateurs')
                ->pause(3000)
                ->press('Ajouter')
                ->pause(2000)
                ->type('name','moussa')
                ->type('prenom','ali')
                ->type('tel',20141201)
                ->type('nni',1021230141)
                ->type('login','moussa2')
                ->type('email','mousa1@email.com')
                ->type('password','123456')
                ->type('password-confirm','123456')
                ->select('type_user','admin')
                ->press('Enregistrer')
                ->pause(4000)
                //->press('Fermer')
                //->click('@edit')
                //->pause(3000)
                ->press('Fermer')
                //->press('.Supp')
                //->pause(3000);
                ->click('@export');
        });
    }

    /** @test */
    public function point_tr()
    {
        //$user = factory(User::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/PTransfert')
                ->pause(3000)
                ->press('.bajouter')
                ->pause(2000)
                ->press('.btn-danger')
                ->pause(2000)
                ->click('@edit')
                ->pause(2000)
                ->press('.btn-danger')
                ->pause(2000)
                ->press('.infPt')
                ->pause(2000);
        });
    }

     /** @test */
    public function profile()
    {
        //$user = factory(User::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/admin/10/edit')
               ->pause(3000); 
        });
    }

    /** @test */
    public function transactions()
    {
        //$user = factory(User::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/Transaction')
               ->pause(3000)
               ->click('@config')
               ->pause(3000); 

        });
    }

    /** @test */
    public function configurations()
    {
        //$user = factory(User::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/tarification')
                ->pause(3000)
                ->visit('admin/tarif')
                ->pause(3000)
                ->visit('admin/pourcentage')
                ->pause(3000)
                ->click('@config')
               ->pause(3000)
                ->click('@logo')
                ->pause(3000)
                ->click('@config')
                ->click('@nom')
                ->pause(3000); 
        });
    }
}