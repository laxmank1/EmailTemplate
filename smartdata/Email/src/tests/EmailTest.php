<?php

namespace smartdata\Email\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
     	$this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample1()
    {
     	$this->visit('/emails/add')
         ->type('Taylor', 'name')
          ->type('Taylor', 'subject')
         ->press('Add!')
         ->seePageIs('/emails');
    }
}

