<?php

namespace App\Services;

class HelloEnglish implements HelloService
{
    public function hello(string $name): string
    {
        return "Hello $name, Welcome !";
    }
}
