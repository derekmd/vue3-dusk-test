<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function testEmailTyping()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Email')
                    ->assertSee('Password')
                    ->type('#email', 'foo@bar.com')
                    ->assertVue('canResetPassword', true, '@login') // prop
                    ->assertVue('cantResetPassword', false, '@login') // computed prop
                    ->assertVue('form.email', 'foo@bar.com', '@login'); // reactive data
        });
    }
}
