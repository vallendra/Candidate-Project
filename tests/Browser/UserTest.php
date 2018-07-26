<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Candidate;

class UserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testUserMake()
    {

        $this->browse(function ($browser) {
         $browser->visit('/candidate/create')
            ->type('Lorem Ipsum', "name")
            ->type("1997-12-27", "birth_date")
            ->press('Submit')
            ->seeInDatabase('Lorem Ipsum', ['birth_date' => "1997-12-27"])
            ->assertPathIs('/candidate');
        });
    }
}
