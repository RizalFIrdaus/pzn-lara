<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloIndonesia;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    public function testCreateObjectwithServiceContainer()
    {
        $foo = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);
        self::assertEquals("Foo", $foo->foo());
        self::assertEquals("Foo", $foo2->foo());
        self::assertSame($foo, $foo2);
    }

    public function testCreateObjectwithConstructor()
    {
        $this->app->bind(Person::class, function ($app) {
            return new Person("Rizal", "Firdaus");
        });
        $person = $this->app->make(Person::class);
        self::assertEquals("Rizal", $person->getFistName());
        self::assertEquals("Firdaus", $person->getLastName());
    }

    public function testCreateObjectSingleton()
    {
        $this->app->singleton(Person::class, function () {
            return new Person("Rizal", "Firdaus");
        });
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        self::assertEquals("Rizal", $person1->getFistName());
        self::assertEquals("Firdaus", $person2->getLastName());
        self::assertSame($person1, $person2);
    }

    public function testFooBarServiceContainer()
    {
        $this->app->singleton(Foo::class, function () {
            return new Foo();
        });
        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);
        self::assertEquals("Foo and Bar", $bar->bar());
        self::assertSame($bar->foo, $foo);
        self::assertSame($bar, $bar2);
    }

    public function testCreateObjectwithServiceContainerSingletonDependency()
    {
        $this->app->singleton(Foo::class, function () {
            return new Foo();
        });
        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
        });

        $bar = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($bar, $bar2);
    }

    public function testCreateClassOfInterface()
    {
        $this->app->singleton(HelloService::class, HelloIndonesia::class);
        $hello = $this->app->make(HelloService::class);

        self::assertEquals("Halo Rizal, Selamat Datang!", $hello->hello("Rizal"));
    }
}
