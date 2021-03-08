<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
        public function index ()
    {
        return Product::all();
    }

    public function store(ProductRequest $request)
    {
        try {

        $data = Product::create($request->validated());

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

        $data = Product::findOrFail($request->id);

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

    public function update(ProductRequest $request)
    {
        try {
        $product = Product::find($request->id)->first();

        if ($product !== null) {
            $product = $product->update($request->all());
        }

        return response()->json([
            'info' => 'success',
            'result' => $product
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível atualizar os dados do produto!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Request $request)
    {
        try {

        $product = Product::find($request->id);

        $product = $product->delete();

        return response()->json([
            'info' => 'success',
            'result' => $product
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível excluir o produto!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }
}
