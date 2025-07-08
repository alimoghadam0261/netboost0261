<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutorials;
use Illuminate\Support\Facades\Validator;

class AdminTutorialController extends Controller
{
    public function store(Request $request)
    {
        // اعتبارسنجی داده‌ها
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:tutorials,title',
            'content' => 'required|string',
            'category' => 'required|string',
            'pic' => 'required|string',
            'voice' => 'nullable|string',
            'video' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // ایجاد آموزش جدید
        $tutorial = Tutorials::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'pic' => $request->pic,
            'voice' => $request->voice,
            'video' => $request->video,
        ]);

        // پاسخ موفق با خروجی تمیز
        return response()->json([
            'status' => 'success',
            'message' => 'Tutorial created successfully!',
            'data' => [
                'id' => $tutorial->id,
                'title' => $tutorial->title,
                'category' => $tutorial->category,
                'pic' => $tutorial->pic,
                'voice' => $tutorial->voice,
                'video' => $tutorial->video,
                'created_at' => $tutorial->created_at->toDateTimeString(),
            ]
        ], 201);
    }
}
