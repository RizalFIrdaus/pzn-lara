<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigContohTest extends TestCase
{
    public function testConfig()
    {
        $firstName = config("contoh.author.firstName");
        $lastName = config("contoh.author.lastName");
        $email = config("contoh.email");
        $github = config("contoh.github");
        self::assertEquals("Rizal", $firstName);
        self::assertEquals("Firdaus", $lastName);
        self::assertEquals("rizal.firdaus117@gmail.com", $email);
        self::assertEquals("https://github.com/rizalfirdaus", $github);
    }
}
