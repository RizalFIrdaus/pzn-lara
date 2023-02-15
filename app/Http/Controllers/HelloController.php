<?php

namespace App\Http\Controllers;

use App\Services\HelloIndonesia;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function __construct(
        private HelloIndonesia $helloIndonesia,
        private Bar $bar
    ) {
    }

    public function hello_indo(string $name)
    {
        return $this->helloIndonesia->hello($name);
    }
    public function bar()
    {
        return $this->bar->bar();
    }
}
