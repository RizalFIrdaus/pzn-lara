<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testRouteGet()
    {
        $this->get("/rizal")
            ->assertStatus(200)
            ->assertSeeText("Muhammad Rizal Firdaus");
    }

    public function testRedirect()
    {
        $this->get("/about")
            ->assertRedirect("/rizal");
    }
    public function testRoutingFallback()
    {
        $this->get("/404")
            ->assertSeeText("404");
    }
}
