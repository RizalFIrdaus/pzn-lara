<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StorageTest extends TestCase
{

    public function testStorage()
    {
        $filesystem = Storage::disk("local");
        $filesystem->put("file.txt", "Ini adalah local storage");

        self::assertEquals("Ini adalah local storage", $filesystem->get("file.txt"));
    }

    public function testPublicStorage()
    {
        $filesystem = Storage::disk("public");
        $filesystem->put("test.txt", "Ini test");

        self::assertEquals("Ini test", $filesystem->get("test.txt"));
    }
}
