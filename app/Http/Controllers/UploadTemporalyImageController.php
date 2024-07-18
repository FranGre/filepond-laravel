<?php

namespace App\Http\Controllers;

use App\Models\TemporalyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadTemporalyImageController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->hasFile('image')) {
            return;
        }

        $image = $request->file('image');

        $filename = $image->getClientOriginalName();
        $folder = uniqid('image-');
        $path = 'tmp/images/' . $folder;

        Storage::putFileAs($path, $image, $filename);

        TemporalyImage::create(['folder' => $folder, 'filename' => $filename]);

        return $folder;
    }
}
