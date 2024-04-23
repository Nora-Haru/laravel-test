<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        
        // Get posts created by the currently logged-in user (limit to 3)
        $userPosts = Post::where('user_id', auth()->id())
            ->latest()
            ->take(3)
            ->get();

        // Get posts created by other users (limit to 3)
        $otherPosts = Post::where('user_id', '!=', auth()->id())
            ->latest()
            ->take(6)
            ->get();

        return view('homepage', [
            'title' => 'Home',
            'userPosts' => $userPosts,
            'otherPosts' => $otherPosts,
            'categories' => Category::all()
        ]);
    }
}
