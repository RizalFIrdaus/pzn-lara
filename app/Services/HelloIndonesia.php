<?php

namespace App\Services;

class HelloIndonesia implements HelloService
{
    public function hello(string $name): string
    {
        return "Halo $name, Selamat Datang!";
    }
}
