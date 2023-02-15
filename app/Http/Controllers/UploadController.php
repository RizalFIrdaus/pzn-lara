<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $image = $request->file("image");
        $image->storePubliclyAs("image", $image->getClientOriginalName(), "public");
        return $image->getClientOriginalName();
    }
}
