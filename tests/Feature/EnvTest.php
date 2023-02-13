<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

class EnvTest extends TestCase
{
    public function testEnv()
    {
        $author = ENV("AUTHOR");
        self::assertEquals("Muhammad Rizal Firdaus", $author);
    }

    public function testStaticEnv()
    {
        $static_author = Env::get("AUTHOR");
        self::assertEquals("Muhammad Rizal Firdaus", $static_author);
    }

    public function testDefaultEnv()
    {
        $age = ENV("AGE", 23);
        self::assertEquals(23, $age);
    }
}
