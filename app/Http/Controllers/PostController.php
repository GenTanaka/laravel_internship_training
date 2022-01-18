<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        
        $post = new Post;
        $post->title = $input['title'];
        $post->body = $input['body'];
        $post->category_id = $input['category_id'];
        $post->save();

        if (!empty('tag_ids')){
            $post->tags()->sync($input['tag_ids']);
        }

        return redirect()->route('post.index');
    }
}
