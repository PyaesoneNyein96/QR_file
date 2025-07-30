<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //


    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('dashboard.pages.categories.categoryList', compact('categories'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Category::create($request->all());

        return redirect()->route('dashboard.categories')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {

        $category = Category::findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();

        // return [$category, $categories];

        return view('dashboard.pages.categories.categoryEdit', compact(['category', 'categories']));
    }


    public function update($id, Request $request){

        $category = Category::find($id);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.categories')->with('success', 'Category updated successfully.');
    }


    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('dashboard.categories')->with('success', 'Category deleted successfully.');

    }

}