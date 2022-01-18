<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() 
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $post = $request->all();

        Category::create($post);

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $post = $request->all();

        unset($post['_token'], $post['_method']);
        Category::where(['id' => $id])->update($post);

        return redirect()->route('category.index');
    }
}
