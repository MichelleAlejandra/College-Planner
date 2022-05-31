<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    //use DatabaseMigrations;
     /**
     * My test implementation
     */
    public function test_user_can_register()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login');
            $browser->clickLink('Registrarme');
            $browser->visit('/register');
            $browser->type('name', 'Fernando');
            $browser->type('email', 'michelleagh@gmail.com');
            $browser->type('password', 'hola123');
            $browser->type('password_confirmation', 'hola123');
            $browser->press('Registrarme');
            $browser->assertPathIs('/');
        });
    }
}
