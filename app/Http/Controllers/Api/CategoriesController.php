<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return response()
            ->json([
                'model' => Category::filterPaginateOrder()
            ]);
    }

    public function create()
    {
        return response()
            ->json([
                'form' => Category::initialize(),
                'option' => []
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = Category::create($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return response()
            ->json([
                'model' => $category
            ]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return response()
            ->json([
                'form' => $category,
                'option' => []
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
