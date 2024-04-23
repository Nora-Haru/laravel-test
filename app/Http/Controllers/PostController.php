<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $title = '';
        if ($request->has('category')) {
            $category = Category::firstWhere('slug', $request->category);
            $title = ' in: ' . $category->name;
        }

        if ($request->has('author')) {
            $author = User::firstWhere('username', $request->author);
            $title = ' by: ' . $author->name;
        }

        return view('posts', [
            "title" => "All Posts Article" . $title,
            "posts" => Post::latest()->filter($request->only(['search', 'category', 'author']))
                ->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Article",
            "post" => $post
        ]);
    }
}
