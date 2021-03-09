<?php

namespace App\Http\Controllers;

use App\Models\LogProduct;
use App\Http\Requests\LogProductRequest;
use Illuminate\Http\Request;

class LogProductController extends Controller
{
    public function index ()
    {
        return LogProduct::all();
    }

    public function store(LogProductRequest $request)
    {
        try {

        $data = LogProduct::create($request->validated());

        return response()->json([
            'info' => 'success',
            'result' => $data
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível cadastrar o produto!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }

    public function show(Request $request)
    {
        try {

        $data = LogProduct::findOrFail($request->id);

        return response()->json([
            'info' => 'success',
            'result' => $data
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível capturar os dados do produto!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

}
