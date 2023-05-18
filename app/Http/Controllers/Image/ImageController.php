<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $imageService;

    function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function uploadImage(Request $request)
    {
        $this->imageService->uploadImage($request);
    }
    public function uploadMultipleImage(Request $request)
    {
        $this->imageService->uploadMultipleImage($request);
    }
}
