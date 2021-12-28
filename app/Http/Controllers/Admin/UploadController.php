<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\UploadService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;


class UploadController extends Controller
{
    protected $upload;

    public function __construct(UploadService $uploadService)
    {
        $this->upload = $uploadService;
    }

    public function store(Request $request):JsonResponse
    {
        $url = $this->upload->store($request);
        if($url){
            return response()->json([
                'error' => false,
                'url' => $url
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => "Không thể lưu file"
        ]);
        
    }
}
