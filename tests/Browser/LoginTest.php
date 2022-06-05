<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * My test implementation
     */
    public function test_login()
    {
        User::create([
            'name' => 'Usuario prueba',
            'email' => 'michellea.gonzalezh@uqvirtual.edu.co',
            'password' => Hash::make('hola123'),
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/login');
            $browser->type('email', 'michellea.gonzalezh@uqvirtual.edu.co');
            $browser->type('password', 'hola123');
            $browser->press('Ingresar');
            $browser->assertPathIs('/')->assertSee('Usuario prueba');
        });
    }
}
