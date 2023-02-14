<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    public function testFacadeConfig()
    {
        $firstName = config("contoh.author.firstName");
        $firstName2 = Config::get("contoh.author.firstName");

        self::assertEquals($firstName, $firstName2);
    }

    public function testFacadeDependency()
    {
        $config = $this->app->make("config");
        $firstName1 = $config->get("contoh.author.firstName");
        $firstName2 = Config::get("contoh.author.firstName");

        self::assertEquals($firstName1, $firstName2);
    }
}
