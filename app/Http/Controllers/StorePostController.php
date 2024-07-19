<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\TemporalyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorePostController extends Controller
{
    public function __invoke(Request $request)
    {
        $temporalyImages = TemporalyImage::all();

        // En caso de que falle la validación, me eliminas todas las imágenes, tanto locales como en ImageTemporaly

        $post = Post::create(['title' => $request->title, 'description' => $request->description]);

        foreach ($temporalyImages as $temporalyImage) {
            $oldPath = 'tmp/images/' . $temporalyImage->folder . '/' . $temporalyImage->filename;
            $newPath = 'images/' . $temporalyImage->folder . '/' . $temporalyImage->filename;

            Storage::copy($oldPath, $newPath);

            Image::create(['post_id' => $post->id, 'name' => $temporalyImage->filename, 'path' => $newPath]);

            Storage::deleteDirectory('tmp/images/' . $temporalyImage->folder);

            $temporalyImage->delete();
        }
    }
}
