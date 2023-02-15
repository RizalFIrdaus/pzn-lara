<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UploadTest extends TestCase
{
    public function testUpload()
    {
        $this->post("/uploads/image", [
            "image" => UploadedFile::fake()->image("cobagesya.png")
        ])->assertSeeText("cobagesya.png");
    }
}
