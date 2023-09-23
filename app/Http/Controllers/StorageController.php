<?php

namespace App\Http\Controllers;

use App\Traits\UploadImageTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Response;

class StorageController extends Controller
{
    use UploadImageTrait;

    /**
     * @throws ValidationException
     */
    public function upload(Request $request): JsonResponse
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,png,jpeg|max:2048',
            'path' => 'required'
        ]);

        $path = $request->path;

        $name = $this->doUploadImage($path, $request->image, []);

        return response()->json(['url' => url("/storage/{$path}/{$name}")]);
    }

    public function show(Request $request)
    {
        $storagePath = storage_path('app/' . $request->path .'/'.$request->file);
        $mimeType = mime_content_type($storagePath);
        $headers = array(
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="'.$request->file.'"'
        );

        return Response::make(file_get_contents($storagePath), 200, $headers);
    }

    public function delete(Request $request): JsonResponse
    {
        Storage::disk('public')->delete('/'.$request->path.'/'.$request->file);

        return response()->json(['message' => 'Delete image berhasil']);
    }
}
