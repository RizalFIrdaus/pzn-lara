<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{
    public function testCreateObjectManualFoo()
    {
        $foo = new Foo();
        self::assertEquals("Foo", $foo->foo());
    }

    public function testCreateDependencyBarbyFoo()
    {
        $bar = new Bar(new Foo());
        self::assertEquals("Foo and Bar", $bar->bar());
    }
}
