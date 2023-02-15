<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestHelloTest extends TestCase
{
    public function testHelloIndonesiaFromController()
    {
        $this->get("/hello-indonesia/rizal")
            ->assertSeeText("Hello rizal, Selamat Datang!");
    }

    public function testFooBar()
    {
        $this->get("foo-bar")
            ->assertSeeText("Foo and Bar");
    }
}
