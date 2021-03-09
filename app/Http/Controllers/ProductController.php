<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index ()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {

        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->amount = $request->amount;

        $product->save();

        $request->session()->flash('alert-success', 'Produto adicionado com sucesso!');
        return redirect()->route('products.index');

    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $action = action('ProductController@update', $product->id);
        return view('products.edit', compact('product', "action"));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->amount = $request->amount;

        $product->save();

        $request->session()->flash('alert-success', 'Produto alterado com sucesso!');

        return redirect(route('products.index'));
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        $request->session()->flash('alert-success', 'Produto apagado com sucesso!');

        return redirect()->back();
    }
}
