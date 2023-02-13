<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceProviderTest extends TestCase
{
    public function testFooBarServiceRegister()
    {
        $bar = $this->app->make(Bar::class);
        self::assertEquals("Foo and Bar", $bar->bar());
    }

    public function testFooBarServiceSingleton()
    {
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($bar1, $bar2);
    }

    public function testCreateSingletonbyObject()
    {
        $hello = $this->app->make(HelloService::class);
        self::assertEquals("Hello Rizal, Welcome !", $hello->Hello("Rizal"));
    }
}
