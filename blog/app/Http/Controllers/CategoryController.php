<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController
{
    public function index()
    {
        return view('category.index', [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('category.edit', [
            'category' => null,
        ]);
    }

    public function store(Request $request)
    {
        Category::create($this->validateCategory($request));
        return redirect()->action([CategoryController::class, 'index']);
    }

    public function show(Category $category)
    {
        return view('category.show', [
            'category' => $category,
        ]);
    }

    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category,
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $category->update($this->validateCategory($request));
        return redirect()->action([CategoryController::class, 'index']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->action([CategoryController::class, 'index']);
    }

    public function validateCategory(Request $request)
    {
        return $request->validate([
            'category' => ['string', 'required', Rule::unique('category')],
        ]);
    }
}
