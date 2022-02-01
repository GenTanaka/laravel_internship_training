<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use App\Mail\CreatePost;
use DB;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index(Request $request)
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

    public function store(StoreBlogPost $request)
    {
        $input = $request->all();
        if (!empty($request->file('image'))) {
            $input['image'] = $request->file('image')->store('images');
        }
        
        DB::beginTransaction();
        try {
            $post = new Post;
            $post->title = $input['title'];
            $post->body = $input['body'];
            $post->category_id = $input['category_id'];
            if (!empty($input['image'])) {
                $post->image = $input['image'];
            }
            $post->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        if (!empty($input['tag_ids'])){
            $post->tags()->sync($input['tag_ids']);
        }
        $email = 'aaa@example.com';
        Mail::to($email)->send(new CreatePost($post));

        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $post['category'] = Category::find($post['category_id'])['name'];
        $post['body'] = nl2br(htmlspecialchars($post['body'], ENT_QUOTES, 'UTF-8'));
        return view('post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(StoreBlogPost $request, $id)
    {
        $post = $request->all();

        unset($post['_token'], $post['_method']);
        Post::where(['id' => $id])->update($post);
        $postTable = new Post;

        if (!empty($input['tag_ids'])){
            $postTable->tags()->sync($input['tag_ids']);
        }

        return redirect()->route('post.index');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index');
    }
}
