<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait UploadImageTrait
{
    public function doUploadImage($path, $file, $dimensions):string
    {
        $loginUser = auth()->user()->id ?? rand();
        $extension = $file->getClientOriginalExtension();
        $imageName = Carbon::now()->timestamp . '_' . uniqid(). '_' . $loginUser . '.' . $extension;
        Storage::disk('public')->put($path . '/'. $imageName, Image::make($file)->encode($extension));
        foreach ($dimensions as $dimension) { // resize & upload thumbnail image
            $resizeImage  = Image::make($file)->resize($dimension, null, function($constraint) {
                $constraint->aspectRatio();
            })->encode($extension);

            Storage::disk('public')->put($path .'/'. $dimension . '/' .$imageName, $resizeImage );
        }

        return $imageName;
    }
}
