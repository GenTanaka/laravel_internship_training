<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = [
            [
                'id' => 1,
                'name' => 'PHP',
                'created_at' => '2020/11/11',
                'updated_at' => '2020/12/11'
            ],
            [
                'id' => 2,
                'name' => 'Python',
                'created_at' => '2020/12/05',
                'updated_at' => '2020/12/05'
            ],
        ];
        return view('category.index', compact('categories'));
    }
}
