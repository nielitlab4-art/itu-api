<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Itu;
use Illuminate\Http\Request;

class ItuController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'dob'     => 'required|date',
            'email'   => 'required|email|unique:itu,email',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string',
            'gender'  => 'nullable|string',
        ]);

        $itu = Itu::create($validated);

        return response()->json([
            'status'  => true,
            'message' => 'Student created successfully',
            'itu'     => $itu,
        ], 201);
    }

    public function index()
    {
        $itu = Itu::all();
        return response()->json([
            'status' => true,
            'itu'    => $itu,
        ], 200);
    }

    public function show($id)
    {
        $itu = Itu::find($id);
        if (!$itu) {
            return response()->json([
                'status'  => false,
                'message' => 'Student not found',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'itu'    => $itu,
        ], 200);
    }
}