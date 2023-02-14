<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testViewHelloWorld()
    {
        $this->get("/hello-world")
            ->assertSeeText("World Rizal");
    }
}
