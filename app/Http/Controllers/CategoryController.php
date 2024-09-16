<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the category.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin/categories', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin/add_category');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:100|unique:categories,category_name,NULL,id,deleted_at,NULL',
        ]);
        Category::create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('admin/edit_category', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:100|unique:categories,category_name,' . $id.',id,deleted_at,NULL',
        ]);
        Category::where('id', $id)->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * soft delete the specified category from storage if it has not topics.
     */
    public function destroy(Category $category)
    {

        if ($category->no_of_topics()) {
            return redirect()->route('categories.index')->with('message', "Can't delete because it has related topics");
        }

        $category->delete();
        return redirect()->route('categories.index');
    }
}
