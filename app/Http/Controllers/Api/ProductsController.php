<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return response()
            ->json([
                'model' => Product::filterPaginateOrder()
            ]);
    }

    public function create()
    {
        return response()
            ->json([
                'form' => Product::initialize(),
                'option' => [
                    'categories' => Category::orderBy('name')->get()
                ]
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id'=>'required'
        ]);

        $product = Product::create($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()
            ->json([
                'model' => $product
            ]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return response()
            ->json([
                'form' => $product,
                'option' => [
                    'categories' => Category::orderBy('name')->get()
                ]
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id'=>'required'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
