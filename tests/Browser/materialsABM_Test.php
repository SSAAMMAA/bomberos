<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class materialsABM_test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     public function testLogin()
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                     ->type('usuario', 'fsamartino')
                     ->type('password', '123456')
                     ->press('Iniciar sesión')
                     ->assertSee('Facundo');
         });
     }
     public function testUp()
     {
       $this->browse(function (Browser $browser) {
         $browser->visit('/material/create')
                 ->type('nombre', 'pruebaTest')
                 ->select('vehiculo_id', '2')
                 ->select('rubro', 'INCENDIO')
                 ->type('detalle', 'Este test verifica el alta de un material')
                 ->press('Registrar')
                 ->assertSee('pruebaTest');

      });
   }

      public function testModify()
      {
        $this->browse(function (Browser $browser) {
          $browser->click('.glyphicon-edit')
          //->visit('/material/111/edit')
                  ->clear('nombre')
                  ->type('nombre', 'pruebaModificacionTest')
                  ->select('vehiculo_id', '4')
                  ->select('rubro', '4')
                  ->clear('detalle')
                  ->type('detalle', 'Este test verifica la modificacion de un material')
                  ->press('Editar')
                  ->visit('/material')
                  ->assertSee('pruebaModificacionTest');

       });
    }

    public function testBaja()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/material')
                ->click('.glyphicon-trash')
                ->visit('/material')
                ->assertDontSee('pruebaModificacionTest');

     });
   }
}
