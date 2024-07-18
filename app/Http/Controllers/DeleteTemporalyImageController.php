<?php

namespace App\Http\Controllers;

use App\Models\TemporalyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteTemporalyImageController extends Controller
{
    public function __invoke(Request $request)
    {
        $temporalyImage = TemporalyImage::where('folder', $request->getContent())->first();
        $folder = $temporalyImage->folder;

        $directory = 'tmp/images/' . $folder;

        Storage::deleteDirectory($directory);

        $temporalyImage->delete();
    }
}
