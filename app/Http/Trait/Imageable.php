<?php

namespace App\Http\Trait;

use Illuminate\Support\Facades\Storage;

trait Imageable{

    public function insertImage($title, $image, $dir)
    {
        $newImage  = $title . '_' . date('Y-m-d-H-i-s') . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($dir), $newImage);
        return $newImage;
    }


    public function deleteImage($diskName,$old_image)
    {
        Storage::disk($diskName)->delete($old_image);
    }
}
